@extends('layouts.vendor.main')

@section('title')
    Vendor Dashboard
@endsection


@section('content')
<a href="/vendor/coupons/create" class="btn btn-primary btn-sm">+ Coupons</a>
{{-- Coupons Section --}}
<div class="row">
    @foreach ($coupons as $item)
        <div class="card  mb-3" style="max-width: 18rem;">
            <div class="card-header">{{ $item->code }}</div>
            <div class="card-body text-primary">
                <h5 class="card-title">{{ $item->discount_value }} {{ $item->discount_type === 'fixed' ? "$" : "%" }}</h5>
                <p class="card-text">{{ $item->description }}</p>
                <p class="cart-text">Expire On {{ $item->expiry }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection