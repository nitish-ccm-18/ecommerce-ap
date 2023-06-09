<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Auth;

class AddressController extends Controller
{
    public function store(Request $request) {
        
        $request->validate([
            'line1' => 'required',
            'line2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'tag' => 'required'
        ]);

        return Address::create([
            'user_id' => Auth::id(),
            'line1' => $request->line1,
            'line2' => $request->line2,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'tag' => $request->tag
        ]); 
    }

    
}
