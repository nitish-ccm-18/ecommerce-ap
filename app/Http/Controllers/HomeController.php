<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // list all products and their category
    public function index(string $category = null)
    {
        $products = false;
        $categories = Category::all()->where('status', 1);

        if ($category) {
            // All product with active status and category status with specified category id
            $products = Product::where(['products.status' => 1, 'categories.status' => 1, 'products.category_id' => $category])
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->get(['products.*', 'categories.status']);
            if ($products->isNotEmpty()) {
                $products = $products->toQuery()->paginate(6);
            }
            // Get all active status
            return view('welcome', ['products' => $products, 'categories' => $categories]);
        }

        // All product with active status and category status
        if (count(Product::all()) > 0) {
            $products = Product::where(['products.status' => 1, 'categories.status' => 1])
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->get(['products.*', 'categories.status'])->toQuery()->paginate(6);
        }

        return view('welcome', ['products' => $products, 'categories' => $categories]);
    }

    public function subscribe(Request $request)
    {
        $subcriber = DB::select('select email from subscribers where email = ?', [$request->subcriber_email]);
        if ($subcriber) {
            DB::insert('insert into subscribers (email) values(?)', [$request->subscriber_email]);
            return 'You are subscribed now you will receive all our important events';
        }
        return 'You are already registred with us.';
    }
}
