<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    // Add coupon
    public function add(Request $request) {
        
    }

    public function create() {
        return view('vendor.coupons.create');
    }

    public function store(Request $request) {

        $request->validate([
            'coupon_code' => 'required',
            'coupon_description' => 'required',
            'valid_from' => 'required|date',
            'valid_till' => 'required|date',
            'coupon_type' => 'required',
            'coupon_value' => 'required|numeric'
        ]); 
        
        Coupon::create([
            'code' => $request->coupon_code,
            'description' => $request->coupon_description,
            'from' => $request->valid_from,
            'expiry' => $request->valid_till,
            'discount_type' => $request->coupon_type,
            'discount_value' => $request->coupon_value
        ]);

        return $request->input();
    }

    public function deactiveCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->update([
            'status' => 'inactive'
        ]);
    }
}
