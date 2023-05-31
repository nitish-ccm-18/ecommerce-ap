<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    // list all products
    public function index() 
    {
        $products = Product::all();
        return response()->json($products);
    }

    // list all category
    public function fetchCategories(Request $request) 
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
