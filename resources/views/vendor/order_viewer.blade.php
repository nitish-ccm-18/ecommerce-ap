@extends('layouts.vendor.main')

@section('title')
    Vendor Dashboard
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
      <ul>
          <p>Customer Name : {{ $order[0]->user_name}}</p>
          <p>Total Price : {{ $order[0]->sale_price}} </p>
          <p>Delivery Address : {{ $order[0]->address}} </p>
          <p>Order Time {{ $order[0]->order_time }}</p>
      </ul>
      @foreach ($order as $item)
      <div class="card col-3">
        <img class="card-img-top" src="{{ url('/public/Image/Products/'.$item->product_picture)}}" height="200px" width="100px" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$item->product_name }}</h5>
          <p class="card-text">{{ $item->category_name }}</p>
          <p class="card-text">$
              <del>{{$item->price}} </del> 
              {{$item->sale_price}}
          </p>
        </div>
        <div class="card-footer">
          <small class="text-muted">{{ $item->order_time }}</small>
        </div>
      </div>
      @endforeach
  </div>
</div>
@endsection


