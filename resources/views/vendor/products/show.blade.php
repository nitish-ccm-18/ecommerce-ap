@extends('layouts.app')

@section('title')
   Welcome | GetProduct 
@endsection


@section('content')
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ url('public/Image/Products/'.$product->image)}}" alt="Product image">
    <div class="card-body">
      <h5 class="card-title">{{ $product->name }} <span class="badge bg-secondary">{{$category->name}}</span></h5>
      <p class="card-text ">{{ $product->description }}</p>
       <p class="card-text">
            <span class="text-decoration-line-through">{{ $product->price }} </span>
            <span class="text-decoration-none">{{ $product->sale_price }}</span> Rs
        </p>
    </div>
  </div>
@endsection