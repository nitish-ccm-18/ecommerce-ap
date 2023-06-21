@extends('layouts.vendor.main')

@section('title')
    Vendor Dashboard
@endsection


@section('content')
<div class="container-fluid">
    <a href="/vendor/coupons/create" class="btn btn-primary btn-sm m-2">+ Coupons</a>
    {{-- Coupons Section --}}
    <div class="row">
        @foreach ($coupons as $coupon)
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header">{{ $coupon->code }}</div>
                <div class="card-body text-primary">
                    <h5 class="card-title">{{ $coupon->discount_value }} {{ $coupon->discount_type === 'fixed' ? "$" : "%" }}</h5>
                    <p class="card-text">{{ $coupon->description }}</p>
                    <p class="cart-text">Expire On {{ $coupon->expiry }}</p>
                    <p class="cart-text">Usage {{ $coupon->usage }}/{{ $coupon->limit}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection