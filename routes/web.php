<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;


use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Coupon;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SweetAlertController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Controller
Route::get('/{category?}', [HomeController::class,'index'])->where('category', '[0-9]+');
Route::post('/subscribe', [HomeController::class,'subscribe'])->name('subscribe');


// Auth Route
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/authenticate',[AuthController::class,'authenticate']);
Route::get('/logout',[AuthController::class,'logout']);



Route::get('/categories', [CategoryController::class,'index']);
Route::get('/categories/all',[CategoryController::class,'fetchCategories']);


// User routes started with prefix "user"
Route::prefix('users')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])
    ->name('user.profile');

    Route::get('/dashboard',[UserController::class,'dashboard'])
    ->middleware('auth')
    ->name('user.dashboard');
});






// All routes started with "vendors" prefix and Vendor Protected Route.
Route::group(['prefix'=>'vendor', 'middleware' => ['auth','isVendor']], function() {

    // Vendor Profile
    Route::get('/profile', [ProfileController::class, 'show'])
    ->name('vendor.profile');

    // Vendor Dashboard
    Route::get('/dashboard',[VendorController::class,'dashboard'])
    ->middleware('isVendor')
    ->name('vendor.dashboard');

    // Form and Handler for adding new category
    Route::get('/categories/create', [CategoryController::class,'create'])
    ->name('category.create');
    Route::post('/categories/create', [CategoryController::class,'store']);

    // Form and Handler for editing given category
    Route::get('/categories/edit/{id}', [CategoryController::class,'editPage'])
    ->name('category.edit');
    Route::post('/categories/edit', [CategoryController::class,'edit']);

    // Handler for changing status of category 
    Route::get('/categories/status/edit/{id}', [CategoryController::class,'changeStatus'])
    ->name('category.status');

    

    // Form and Handler for adding new category
    Route::get('/products/create', [ProductController::class,'create']);
    Route::post('/products/create', [ProductController::class,'store']);

    // Form and Handler for editing category
    Route::get('/products/edit/{id}', [ProductController::class,'editPage']);
    Route::post('/products/edit/', [ProductController::class,'edit']);

    // Handler for changing product status and make product as featured
    Route::get('/products/status/edit/{id}', [ProductController::class,'changeStatus']);
    Route::get('/products/feature/edit/{id}', [ProductController::class,'markFeaturedProduct']);

    

    // Form and handler for creatig new coupon
    Route::get('/coupons/create',[CouponController::class,'create']);
    Route::post('/coupons/store',[CouponController::class,'store']);

});




Route::post('/users/register', [UserController::class,'store']);





// Products Routes
Route::get('/products', [ProductController::class,'index']);
Route::get('/products/{id}', [ProductController::class,'show']);
Route::get('/products/category/{category}', [ProductController::class,'productByCategory']);








// Cart Route
Route::get('/cart/add/{id}', [CartController::class,'add']);
Route::patch('/cart/update', [CartController::class,'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class,'remove'])->name('cart.remove');


Route::view('cart','cart')->name('cart');
Route::post('/cart/store', [AjaxController::class,'add_to_cart'])
->name('cart.store');
Route::get('/cart/count', [AjaxController::class,'countCartItems'])
->name('cart.count');






Route::view('/address/new','users.address');
Route::post('/address/new', [AddressController::class,'store']);












Route::get('/checkout',[CheckoutController::class,'checkoutPage']);
Route::post('/checkout',[CheckoutController::class,'checkout']);

Route::get('/coupon/check',[CouponController::class,'checkCoupon']);
Route::get('/coupon/remove',[CouponController::class,'removeCoupon']);
Route::post('/coupons/validate', [CouponController::class,'validateCoupon']);



Route::group(['prefix'=>'vendor', 'middleware' => ['auth','isVendor']], function() {

    // Vendor Dashboard Pages
    Route::get('/dashboard',[VendorController::class,'dashboard']);
    Route::get('/categories',[VendorController::class,'listCategories']);
    Route::get('/products',[VendorController::class,'listProducts']);
    Route::get('/coupons',[VendorController::class,'listCoupons']);





    
    // Category Routes 


    Route::get('/categories/{id}',[CategoryController::class,'show'])->whereNumber('id');



    Route::get('/categories/status/edit/{id}', [CategoryController::class,'changeStatus']);

    // Product Route

    Route::get('/products/{id}',[ProductController::class,'showSingleProduct']);



});

Route::get('/user/orders',[OrderController::class,'orders']);
Route::get('/users/orders/{id}',[OrderController::class,'userSingleOrderViewer'])->middleware('auth');


Route::get('/my-orders',[UserController::class,'myOrders']);


Route::get('/password/forgot', [AuthController::class,'sendEmailForm']);
Route::post('/password/forgot', [AuthController::class,'sendPasswordResetMail']);


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');


Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');





Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
        }
    );

    if($status === Password::PASSWORD_RESET) {
        Alert('Password changed','Password changed successfully.');
        return redirect()->route('login')->with('status', 'Your password has been changed.');
    }
    return back()->withErrors(['email' => [__($status)]]);

})->name('password.update');


Route::get('/users/order/{id}', [OrderController::class, 'showOrder']);




Route::get('/profile/{id}',[ProfileController::class,'showUserProfile'])->whereNumber('id');;
Route::get('/profile/edit',[ProfileController::class,'edit']);

Route::patch('/profile/update',[ProfileController::class,'update']);


Route::get('/test-resource', function() {
    // if(Gate::allows('access-test'))
    //     Alert('Allowed','You are allowed beacuse you have admin credential');
    // else 
    //     Alert('Unauthorized','You have not authority of doing what you are trying to do ?');

    if(Gate::authorize('access-test'))
        Alert('Allowed','You are allowed beacuse you have admin credential');
    return redirect('/');
});