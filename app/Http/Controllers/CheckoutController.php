<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Address;

class CheckoutController extends Controller
{
    public function checkout(Request $request) {

        // If user is not login
        if(!Auth::check()) {
            return redirect('/login')->with('warning','Login first then you can checkout.');
        }
        $addresses  = Address::all()->where('user_id',Auth::id());
        return view('users.checkout',['addresses'=>$addresses]);
        
    }
}
