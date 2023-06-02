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
        return redirect('/');
    }

    // remove from cart
    public function remove() {

    }

    // update cart

    // list all items
}
