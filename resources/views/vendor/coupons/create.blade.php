@extends('layouts.vendor.main')

@section('title')
   Create Coupon | GetProduct 
@endsection


@section('content')
<h3 class="text-center">Create Coupon Form</h3>
<form action="/vendor/coupons/store" method="POST" class="form-control">
    @csrf
    <div class="mb-3">
        <label for="CouponCode" class="form-label">Coupon Code</label>
        <input type="text" class="form-control" id="CouponCode" name="coupon_code">
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" name="coupon_description" id="CouponDescription" style="height: 100px"></textarea>
        <label for="CouponDescription">Description</label>
    </div>
    <div class="d-flex justify-content-start">
        <div class="mb-3">
            <label for="CouponDescription">From</label>
            <input type="date" class="form-control" id="CouponCode" name="valid_from">
        </div>
        <div class="mb-3 mx-2">
            <label for="CouponDescription"></label>
            <input type="date" class="form-control" id="CouponCode" name="valid_till">
        </div>
    </div>
    <div class="d-flex justify-content-start">
        <div class="mb-3">
            <label for="CouponType">Discount Type</label>
           <select id="" class="form-control" name="coupon_type">
            <option>Select Coupon Type</option>
            <option value="percentage">Percentage Coupon</option>
            <option value="fixed">Fixed Coupon</option>
           </select>
        </div>
        <div class="mb-3 mx-2">
            <label for="CouponValue">Discount Value</label>
            <input type="number" class="form-control" id="CouponValue" name="coupon_value">
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary form-control">Create</button>
    </div>
</form>  
@endsection