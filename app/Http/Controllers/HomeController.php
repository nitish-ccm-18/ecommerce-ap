<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use DB;

class HomeController extends Controller
{
    // list all products
    public function index(string $category = null) 
    {
        if($category) {
            // All product with active status and category status with specified category id
            $products = Product::where(['products.status'=>1, 'categories.status'=>1,'products.category_id'=>$category])
            ->join('categories','products.category_id','=','categories.id')
            ->get(['products.*','categories.status']);

            // Get all active status
            $categories = Category::all()->where('status',1);
            return view('welcome', ['products'=>$products,'categories'=>$categories]);
        }

        // Get all active status
        $categories = Category::all()->where('status',1);

        // All product with active status and category status
        $products = Product::where(['products.status'=>1, 'categories.status'=>1])
        ->join('categories','products.category_id','=','categories.id')
        ->get(['products.*','categories.status']);

        return view('welcome', ['products'=>$products,'categories'=>$categories]);
    }

}
