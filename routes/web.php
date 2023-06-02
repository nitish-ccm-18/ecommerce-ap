<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SweetAlertController;
use Session;
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


// Route::get('/', [HomeController::class,'index']);


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
    Route::get('/vendors/dashboard',[VendorController::class,'dashboard']);
    
    // Category Routes 
    Route::get('/categories/create', [CategoryController::class,'create']);
    Route::post('/categories/create', [CategoryController::class,'store']);

    Route::get('/categories/{id:[0-9]+}',[CategoryController::class,'show']);

    Route::get('/categories/edit/{id}', [CategoryController::class,'editPage']);
    Route::post('/categories/edit', [CategoryController::class,'edit']);

    Route::get('/categories/status/edit/{id}', [CategoryController::class,'changeStatus']);

    // Product Route
    Route::get('/products/create', [ProductController::class,'create']);
    Route::post('/products/create', [ProductController::class,'store']);

    Route::get('/products/edit/{id}', [ProductController::class,'editPage']);
    Route::post('/products/edit/', [ProductController::class,'edit']);

    Route::get('/products/status/edit/{id}', [ProductController::class,'changeStatus']);

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
Route::get('/cart/remove', [CartController::class,'remove']);

Route::get('/reset',function() {
    Session::flush();
});

Route::view('cart','cart');