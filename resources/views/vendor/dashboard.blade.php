@extends('layouts.vendor.main')

@section('title')
    Vendor Dashboard
@endsection


@section('content')
    <h3 class="">Welcome to Vendor Dashboard</h3>
    <div class="row justify-content-start">
        <div class="card text-white bg-primary mb-3 mx-1 text-center" style="max-width: 18rem;">
            <div class="card-header">Total Products</div>
            <h5 class="card-title ">
              <a href="/vendor/products" class="link-light">{{ $product_count }}  </a>
            </h5>
        </div>
        <div class="card text-white bg-primary mb-3 mx-1 text-center" style="max-width: 18rem;">
            <div class="card-header">Total Categories</div>
            <div class="card-body">
              <h5 class="card-title ">
                <a href="/vendor/categories" class="link-light"> {{ $category_count }}  </a>
              </h5>
            </div>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="card text-white bg-primary mb-3 mx-1 text-center" style="max-width: 18rem;">
            <div class="card-header">Total Orders</div>
            <div class="card-body">
              <h5 class="card-title ">
                <a href="/vendor/orders" class="link-light">{{ $order_count }}  </a>
              </h5>
            </div>
        </div>
    
        <div class="card text-white bg-primary mb-3 mx-1 text-center" style="max-width: 18rem;">
            <div class="card-header">Total Coupon</div>
            <div class="card-body">
              <h5 class="card-title ">
                <a href="/vendor/coupons" class="link-light">{{ $coupon_count }}  </a>
              </h5>
            </div>
        </div>
    
    </div>
@endsection


