@extends('layouts.users.main')

@section('title')
    My Orders
@endsection

@section('content')
<div class="accordion" id="OrderAccordion">
@foreach ($orders as $id=>$order)
<div class="accordion-item mb-2">
    <h2 class="accordion-header" id="Order{{$id}}">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order-collapse{{$id}}" aria-expanded="true" aria-controls="order-collapse{{$id}}">
        <div class="row justify-content-start">
          <span>
            Order Id : {{$order->id}}
          </span>
          <span>
            Order Value : ${{ $order->total_price}}
          </span>
        </div>
        <div class="row justify-content-start">
          <span>
            Coupon Discount : {{  $order->coupon ? $order->coupon->discount_value : '' }} 
            @isset($order->coupon)
              {{  $order->coupon && $order->coupon->discount_type == 'fixed' ? '$' : '%' }}
            @endisset
          </span>
          <span>
            Order Coupon : {{ $order->coupon ? $order->coupon->code : ''}}
          </span>
        </div>  
        <div class="row justify-content-start">
          <span>
            Ordered On : {{  Auth::user()->created_at->toDateString() }}
          </span>
        </div>    
      </button>
    </h2>
    <div id="order-collapse{{$id}}" class="accordion-collapse collapse" aria-labelledby="Order{{$id}}" data-bs-parent="#OrderAccordion">
      <div class="accordion-body">
        <div class="row justify-content-center">
            @forelse ($order->orderdetails as $orderdetail)
            <div class="card col-3">
                <img class="card-img-top" src="{{ url('/public/Image/Products/'.$orderdetail->product->image)}}"  width="50px" height="200px" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$orderdetail->product->name }}</h5>
                  <p class="card-text">{{ $orderdetail->product->category->name }}</p>
                  <p class="card-text">$
                      <del>{{$orderdetail->product->price}} </del> 
                      {{$orderdetail->product->sale_price}}
                  </p>
                  <p>Qty {{$orderdetail->quantity}}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @empty
    <div class="col">
      <h3 class="text-center">No Items in the cart <a href="/">Shop Here</a></h3>
    </div>
    @endforelse

</div>
@endsection
