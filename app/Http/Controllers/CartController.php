<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
class CartController extends Controller
{
    // update in cart
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $subtotal = $request->quantity * $product->sale_price;
            $cart[$request->id]['subtotal'] = $subtotal;

            $total = 0;
            // calculate total
            foreach($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        
            session()->put('cart', $cart);
            session()->put('total', $total);
            Session::forget('coupon');
            return array(
                'quantity' => $cart[$request->id]['quantity'],
                'subtotal' => $subtotal,
                'total' => $total
            );
        }
    }
  

    // remove from cart
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                $total = session()->get('total') - $cart[$request->id]['price']*$cart[$request->id]['quantity'];
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            Alert('Removed Successfully','Item from cart removed successfully.');
        }
    }
}
