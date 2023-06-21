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
    // Get all categories
    public function listCategories() {
        $categories = Category::all();
        return view('vendor.listCategories',['categories'=>$categories]);
    }

    // Get all categories
    public function listProducts() {
        $products = Product::all();
        return view('vendor.listProducts',['products'=>$products]);
    }

    // Get all categories
    public function listCoupons() {
        $coupons = Coupon::all();
        return view('vendor.listCoupons',['coupons'=>$coupons]);
    }

    // Get all orders
    public function listOrders() {
        $orders = Order::with('orderdetails.products.category,coupon')->get();
    }

    // Login Page
    public function login() {
        return view('vendor.login');
    }

    // Dashboard page
    public function dashboard() {
        $product_count = Product::all()->count();
        $category_count = Category::all()->count();
        $order_count = Order::all()->count();
        $coupon_count = Coupon::all()->count();

        return view('vendor.dashboard',[
            'category_count'=>$category_count,
            "product_count"=>$product_count,
            'coupon_count' => $coupon_count,
            'order_count' => $order_count,
        ]);
    }

    
}
