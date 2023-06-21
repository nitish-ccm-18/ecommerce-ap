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
}
