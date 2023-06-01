<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class VendorController extends Controller
{
    // Login Page
    public function login() {
        return view('vendor.login');
    }

    // Dashboard page
    public function dashboard() {
        $products = Product::all();
        $product_count = $products->count();

        $categories = Category::all();
        $category_count = $categories->count();
        return view('vendor.dashboard',[
            "products" => $products,
            "product_count"=>$product_count,
            "categories" => $categories,
            'category_count'=>$category_count
        ]);
    }
}
