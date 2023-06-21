<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Address;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Coupon;

class CheckoutController extends Controller
{
    public function checkoutPage(Request $request) {

        // If user is not login
        if(!Auth::check()) {
            return redirect('/login')->with('warning','Login first then you can checkout.');
        }
        $addresses  = Address::all()->where('user_id',Auth::id());
        return view('users.checkout',['addresses'=>$addresses]);
        
    }

    public function checkout(Request $request) {
        if(Session::get('cart')) {
            $coupon_id = Session::get('coupon') ? Session::get('coupon')['id'] : null;
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => Session::get('total'),
                'address_id' => $request->address_id,
                'coupon_id' => $coupon_id
            ]);

            if(isset($coupon_id)) {
                Coupon::where('id',$coupon_id)->increment('usage');
            }
            
            // store each product in Orderdetail page
            foreach (Session::get('cart') as $product) {
                Orderdetail::create([
                    'product_id' => $product['id'],
                    'order_id' => $order->id,
                    'quantity' => $product['quantity'],
                    'subtotal' => $product['subtotal']
                ]);
            }

            

            Session::forget('cart');
            Session::forget('coupon');
            Session::forget('total');
            print_r($order);
            echo $request->coupon_id;
            return redirect('/')->with('success','Shop More,Enjoy More');
        }
    }
}
