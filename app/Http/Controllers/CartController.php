<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
class CartController extends Controller
{
    // Add to cart
    public function add($id)
    {
        // find product
        $product = Product::find($id);

        $cart = Session::get('cart', []);
        // check if given product is exist in the cart or not
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }
        Session::put('cart',$cart);
        return redirect('/')->with('success','Product added to cart');
    }

    // update in cart
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  

    // remove from cart
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
