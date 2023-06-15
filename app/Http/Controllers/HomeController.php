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
            ->get(['products.*','categories.status'])->toQuery()->paginate(3);

            // Get all active status
            $categories = Category::all()->where('status',1);
            return view('welcome', ['products'=>$products,'categories'=>$categories]);
        }

        // Get all active status
        $categories = Category::all()->where('status',1);

        // All product with active status and category status
        $products = Product::where(['products.status'=>1, 'categories.status'=>1])
        ->join('categories','products.category_id','=','categories.id')
        ->get(['products.*','categories.status'])->toQuery()->paginate(3);

        return view('welcome', ['products'=>$products,'categories'=>$categories]);
    }

    public function subscribe(Request $request) {
        $subcriber = DB::select('select email from subscribers where email = ?',[$request->subcriber_email]);
        if($subcriber) {
            DB::insert('insert into subscribers (email) values(?)',[$request->subscriber_email]);
            return 'You are subscribed now you will receive all our important events';
        }
        return 'You are already registred with us.';
    }

}
