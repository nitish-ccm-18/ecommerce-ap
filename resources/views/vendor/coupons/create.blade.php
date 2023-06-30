@extends('layouts.vendor.main')

@section('title')
    Add Coupon
@endsection


@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Create Coupon Form</h3>
        <form action="/vendor/coupons/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="CouponCode" class="form-label">Coupon Code</label>
                <input type="text" class="form-control" id="CouponCode" name="coupon_code">
            </div>
            <div class="mb-3">
                <label for="CouponDescription">Description</label>
                <textarea class="form-control" placeholder="Leave a comment here" name="coupon_description" id="CouponDescription"
                    style="height: 100px"></textarea>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="ValidFrom">Valid From</label>
                    <input type="date" class="form-control" id="ValidFrom" name="valid_from">
                </div>
                <div class="col">
                    <label for="ValidTill">Valid Till</label>
                    <input type="date" class="form-control" id="ValidTill" name="valid_till">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="CouponType">Discount Type</label>
                    <select id="" class="form-control" name="coupon_type">
                        <option>Select Coupon Type</option>
                        <option value="percentage">Percentage Coupon</option>
                        <option value="fixed">Fixed Coupon</option>
                    </select>
                </div>
                <div class="col">
                    <label for="CouponValue">Discount Value</label>
                    <input type="number" class="form-control" id="CouponValue" name="coupon_value" min="10">
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary form-control">Create Coupon</button>
            </div>
        </form>
    </div>
@endsection
