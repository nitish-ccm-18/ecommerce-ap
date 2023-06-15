<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
class AjaxController extends Controller
{

    // Handle request when add to cart is pressed
    public function add_to_cart(Request $request) 
    {
        $product_id = $request->product_id;
        
        // find product
        $product = Product::find($product_id);

        $cart = Session::get('cart', []);
        $total = 0;
        
        
        // check if given product is exist in the cart or not
        if(isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
        }else {
            $cart[$product_id] = [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category->name,
                'price' => $product->sale_price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }
        // calculate total
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }


    

        Session::put('cart',$cart);
        Session::put('total',$total);
        Session::forget('coupon');
        return Session::get('cart');
    }

    // Get count of cart items
    public function countCartItems(Request $request) 
    {
        $count = count(Session::get('cart'));
        if($count < 1){
        }
        return count(Session::get('cart'));
    }

    
}
