<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    // list all products
    public function index(string $category = null) 
    {
        if($category) {
            $products = Product::all()->where('category_id', $category);
            $categories = Category::all();
            return view('welcome', ['products'=>$products,'categories'=>$categories]);
        }

        $products = Product::all();
        $categories = Category::all();
        return view('welcome', ['products'=>$products,'categories'=>$categories]);
    }

}
