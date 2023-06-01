@extends('layouts.app')

@section('title')
   Welcome | GetProduct 
@endsection


@section('content')
<section class="">
    <div class="" style="overflow:auto; padding:10px;">
        @foreach ($categories as $category)
            <a href="/{{$category->id}}" class="btn btn-outline-dark">{{ $category->name }}</a>
        @endforeach
    </div>
    <div class="row">
    <h1>Product Section</h1>
    @foreach ($products as $product)
        <div class="card col-3 m-2">
            <img class="card-img-top" src="{{ url('public/Image/Products/'.$product->image)}}" alt="Product image">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text ">{{ $product->description }}</p>
                <p class="card-text">
                        <span class="text-decoration-line-through">{{ $product->price }}</span>
                        <span class="text-decoration-none">{{ $product->sale_price }}</span> Rs
                </p>
                <a href="/products/{{$product->id}}" class="btn btn-sm btn-success">Show</a>
            </div>
        </div>
        @endforeach
    </div> 
</section>

<div class="row" id="product-viewer">
    {{-- Here Product will be fetched by AJAX --}}
</div>    

@push('head')
@endpush
@endsection