<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;
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

        return redirect('/vendors/dashboard');
    }

    public function deactiveCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->update([
            'status' => 'inactive'
        ]);
    }

    public function validateCoupon(Request $request) {

        $request->validate(['coupon_code' => 'required' ]);

        $coupon = Coupon::where('code', $request->coupon_code)->whereDate('expiry','>',Date('y-m-d'))->get();

        // If Coupon is valid
        if($coupon->first()) {
            $type = $coupon[0]->discount_type;
            $discount = $coupon[0]->discount_value;
            $code = $coupon[0]->code;

            // Store Coupon details in session
            Session::put('coupon',array(
                'type' => $type,
                'code' => $code,
                'value' => $discount,
                'id' => $coupon[0]->id
            ));

            // Store coupon code details in session
            $cart = Session::get('cart');
            
            // calculate total price
            $total = 0;
            foreach($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            
            // Calculate coupon discount price
            $coupon_discount = 0;
            if(Session::get('coupon')['type'] == 'fixed') {
                $coupon_discount = Session::get('coupon')['value'];
                $total = $total - $coupon_discount;
            }
            else if(Session::get('coupon')['type'] == 'percentage'){
                $coupon_discount = $total * Session::get('coupon')['value']/100;
                $total = $total - $coupon_discount;
            }
            else { }

            // Store discount and total in session
            Session::put('discount',$coupon_discount);
            Session::put('total', $total);
            return array(
                'total' => $total,
                'status' => 'COUPON_SUCCESS'
            );
        } 
        else { return array( 'status' => 'COUPON_INVALID' ); }
    }

    // remove coupons
    public function removeCoupon() {
        $total = Session::get('total');
        $total = $total +  (int)Session::get('discount');

        Session::forget('coupon');
        Session::forget('discount');
        Session::put('total',$total);
        return array(
            'COUPON_STATUS' => 'COUPON_DELETED',
            'total' => $total
        );
    }

    // return applied coupon
    public function checkCoupon() {
        // If coupon is added
        if(Session::has('coupon')) {
            return array(
                'coupon_type' => Session::get('coupon')['type'],
                'coupon_code' => Session::get('coupon')['code'],
                'coupon_value' => Session::get('coupon')['value'],
                'total' => Session::get('total'),
             );
        }
        else {
            return array(
                'total' => Session::get('total'),
                'COUPON_STATUS' =>'COUPON_UNAVAILABLE'
             );
        }
    }

}
