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
        echo "<pre>";
        print_r($request->input());
        echo "</pre>";

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
}
