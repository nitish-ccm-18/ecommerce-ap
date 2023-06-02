@extends('layouts.app')

@section('title')
   Welcome | GetProduct 
@endsection


@section('content')
<section class="">
    <div class="" style="overflow:auto; padding:10px;">
        <a href="/" class="btn btn-outline-dark">All</a>
        @foreach ($categories as $category)
            <a href="/{{$category->id}}" class="btn btn-outline-dark">{{ $category->name }}</a>
        @endforeach
    </div>
    <div class="row justify-content-center">
    <h1>Product Section</h1>
    @foreach ($products as $product)
        <div class="card col-md-3 my-2">
            <img class="card-img-top" src="{{ url('public/Image/Products/'.$product->image)}}" alt="Product image" height="150px" width="150px">
            <small class="">{{ $product->category->name }}</small>
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text ">{{ $product->description }}</p>
                <p class="card-text">
                        <span class="text-decoration-line-through">{{ $product->price }}</span>
                        <span class="text-decoration-none">{{ $product->sale_price }}</span> Rs
                </p>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between" >
                    <a href="/products/{{$product->id}}" class="btn btn-sm btn-success m-2">Show</a>
                    <a href="/cart/add/{{$product->id}}" class="btn btn-sm btn-success m-2" >Add to Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div> 
</section>

@endsection