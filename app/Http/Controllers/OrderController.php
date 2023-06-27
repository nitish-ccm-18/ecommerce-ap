<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Order;

class OrderController extends Controller
{
    // show user order
    public function orders() {
        $orders = Order::with('user','orderdetails.product.category','coupon')->where('user_id',Auth::user()->id)->get();
        return view('users.myorders',['orders'=>$orders]);
    }

    // show single order
    public function showOrder($id) {
        $order = Order::with('orderdetails.product.category')->where('id',$id)->get();
        return Auth::user()->type === 'admin' ? 
        view('vendor.order_viewer',['order'=>$order]) 
        : view('users.order_viewer',['order'=>$order])  ;
    }

    // show all orders for vendor
    

}
