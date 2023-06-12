<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Coupon;
use DB;

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

        $orders =  DB::select('SELECT * FROM `orders` join orderdetails on orders.id = orderdetails.order_id 
        join addresses on orders.address_id = addresses.id join users on orders.user_id = users.id');

        $coupons = Coupon::all();

        return view('vendor.dashboard',[
            "products" => $products,
            "product_count"=>$product_count,
            "categories" => $categories,
            'category_count'=>$category_count,
            "orders" => $orders,
            "coupons" => $coupons
        ]);
    }

    
}
