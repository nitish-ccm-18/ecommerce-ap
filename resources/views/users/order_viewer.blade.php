@extends('layouts.users.main')

@section('title')
    User Dashboard
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row">
  <p>Order Id : {{ $order[0]->id }}</p>
    @foreach ($order[0]->orderdetails as $item)
    {{-- {{dd($item)}} --}}
    <div class="card col-3">
      <img class="card-img-top" src="{{ url('/public/Image/Products/'.$item->product->image)}}" height="200px" width="100px" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{$item->product->name }}</h5>
        <p class="card-text">{{ $item->product->category->name }}</p>
        <p class="card-text">$
            <del>{{$item->product->price}} </del> 
            {{$item->product->sale_price}}
        </p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
