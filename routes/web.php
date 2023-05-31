<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});





// Category Routes
Route::get('/categories', [CategoryController::class,'index']);



Route::get('/categories/create', [CategoryController::class,'create']);
Route::post('/categories/create', [CategoryController::class,'store']);


Route::get('/categories/{id:[0-9]+}',[CategoryController::class,'show']);

Route::get('/categories/edit/{id}', [CategoryController::class,'editPage']);
Route::post('/categories/edit', [CategoryController::class,'edit']);


Route::get('/categories/all',[CategoryController::class,'fetchCategories']);


// Products Routes
Route::get('/products', [ProductController::class,'index']);

Route::get('/products/create', [ProductController::class,'create']);
Route::post('/products/create', [ProductController::class,'store']);

Route::get('/products/{id}', [ProductController::class,'show']);

Route::get('/products/edit/{id}', [ProductController::class,'editPage']);
Route::post('/products/edit/', [ProductController::class,'edit']);


// Testing for home
Route::get('/test/products',[HomeController::class,'index']);
Route::get('/test/categories',[HomeController::class,'fetchCategories']);


