@extends('layouts.app')

@section('title')
    Welcome | GetProduct
@endsection

@section('content')
<div class="row">
    @foreach ($order as $item)
    <div class="card col-3">
      <img class="card-img-top" src="{{ url('/public/Image/Products/'.$item->product_picture)}}" height="200px" width="100px" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{$item->product_name }}</h5>
        <p class="card-text">{{ $item->category_name }}</p>
        <p class="card-text">{{$item->price}} {{$item->sale_price}}</p>
        <p class="card-text">{{ $item->user_name}}</p>
        <p class="card-text">{{ $item->address}}</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
    @endforeach
  </div>
@endsection
