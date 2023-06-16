<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

// Users Route
Route::view('/users/register','users.register');
Route::view('/users/dashboard','users.dashboard');


Route::post('/users/register', [UserController::class,'store']);

Route::get('/users/profile/edit', [UserController::class, 'editProfilePage']);
Route::post('/users/profile/edit', [UserController::class, 'edit']);

Route::get('/users/profile', [UserController::class, 'showProfile']);


// Vendor Route


// Routes for only vendor
Route::middleware(['auth','isVendor'])->group(function () {
    
});





// Category Routes
Route::get('/categories', [CategoryController::class,'index']);

Route::get('/categories/all',[CategoryController::class,'fetchCategories']);


// Products Routes
Route::get('/products', [ProductController::class,'index']);

Route::get('/products/{id}', [ProductController::class,'show']);
Route::get('/products/category/{category}', [ProductController::class,'productByCategory']);



// Testing for home
Route::get('/test/products',[HomeController::class,'index']);
Route::get('/test/categories',[HomeController::class,'fetchCategories']);









// Auth Route
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/authenticate',[AuthController::class,'authenticate']);
Route::get('/logout',[AuthController::class,'logout']);

Route::get('/cart/add/{id}', [CartController::class,'add']);

Route::patch('/cart/update', [CartController::class,'update'])->name('cart.update');

Route::delete('/cart/remove', [CartController::class,'remove'])->name('cart.remove');

Route::get('/reset',function() {
    Session::flush();
});

Route::view('cart','cart')->name('cart');





Route::view('/address/new','users.address');
Route::post('/address/new', [AddressController::class,'store']);

Route::get('/checkout',[CheckoutController::class,'checkoutPage']);
Route::post('/checkout',[CheckoutController::class,'checkout']);


Route::get('fetch-orders', function() {
    $result = DB::select('SELECT * FROM `orders` join orderdetails on orders.id = orderdetails.order_id 
    join addresses on orders.address_id = addresses.id join users on orders.user_id = users.id');

    echo "<pre>";
    print_r($result);
    echo "</pre>";
});


// Define Route
Route::redirect('/home','/');

Route::post('/coupons/validate', [CouponController::class,'validateCoupon']);



Route::post('/cart/store', [AjaxController::class,'add_to_cart'])->name('cart.store');
Route::get('/cart/count', [AjaxController::class,'countCartItems'])->name('cart.count');

Route::get('/coupon/check',[CouponController::class,'checkCoupon']);



Route::get('/coupon/remove',[CouponController::class,'removeCoupon']);



// Route::prefix('/vendor')->group(function(){
    
// });

Route::group(['prefix'=>'vendor', 'middleware' => ['auth','isVendor']], function() {

    // Vendor Dashboard Pages
    Route::get('/dashboard',[VendorController::class,'dashboard']);
    Route::get('/categories',[VendorController::class,'listCategories']);
    Route::get('/products',[VendorController::class,'listProducts']);
    Route::get('/coupons',[VendorController::class,'listCoupons']);
    Route::get('/orders',[VendorController::class,'listOrders']);
    Route::get('/orders/{id}',[OrderController::class,'singleOrderViewer']);

    
    // Category Routes 
    Route::get('/categories/create', [CategoryController::class,'create']);
    Route::post('/categories/create', [CategoryController::class,'store']);

    Route::get('/categories/{id}',[CategoryController::class,'show'])->whereNumber('id');

    Route::get('/categories/edit/{id}', [CategoryController::class,'editPage']);
    Route::post('/categories/edit', [CategoryController::class,'edit']);

    Route::get('/categories/status/edit/{id}', [CategoryController::class,'changeStatus']);

    // Product Route
    Route::get('/products/create', [ProductController::class,'create']);
    Route::post('/products/create', [ProductController::class,'store']);

    Route::get('/products/{id}',[ProductController::class,'showSingleProduct']);

    Route::get('/products/edit/{id}', [ProductController::class,'editPage']);
    Route::post('/products/edit/', [ProductController::class,'edit']);

    Route::get('/products/status/edit/{id}', [ProductController::class,'changeStatus']);
    Route::get('/products/feature/edit/{id}', [ProductController::class,'markFeaturedProduct']);
    


    Route::get('/coupons/create',[CouponController::class,'create']);
    Route::post('/coupons/store',[CouponController::class,'store']);

});


Route::get('/users/orders/{id}',[OrderController::class,'userSingleOrderViewer'])->middleware('auth');


Route::get('/test',function() {
    echo $name;
});