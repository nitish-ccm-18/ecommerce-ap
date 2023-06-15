<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
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
        $order_count = Order::all()->count();
        $coupon_count = Coupon::all()->count();

        $orders =  DB::select('SELECT 
        orders.id as order_id,
        users.id as user_id,
        users.name as user_name,
        total_price,
        CONCAT(line1,", ",line2,", ",state,", ",pincode) as address
        FROM `orders` 
        join addresses on orders.address_id = addresses.id join users on orders.user_id = users.id order by orders.created_at desc');
        

        $coupons = Coupon::all();

        return view('vendor.dashboard',[
            "products" => $products,
            "product_count"=>$product_count,
            'order_count' => $order_count,
            'coupon_count' => $coupon_count,
            "categories" => $categories,
            'category_count'=>$category_count,
            "orders" => $orders,
            "coupons" => $coupons
        ]);
    }

    
}
