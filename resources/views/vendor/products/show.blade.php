@extends('layouts.vendor.main')

@section('title')
    Welcome | GetProduct
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <img class="col-3" src="{{ url('public/Image/Products/' . $product->image) }}" alt="Product image" height="200px" width="200px">
        <div class="col-6">
            <h5 class="card-title">{{ $product->name }} <span class="badge bg-secondary"><a href="/categories/{{$product->category->id}}" class="text-white">{{ $category->name }}</a></span></h5>
            <p class="card-text ">{{ $product->description }}</p>
            <p class="card-text">
                <strong>Original Price </strong>{{ $product->price }}
            </p>
            <p class="card-text">
                <strong>Sale Price </strong>{{ $product->sale_price }}
            </p>
            <p class="card-text">
                <strong>Quantity</strong> {{ $product->quantity }}
            </p>
            <strong>Status </strong>@php
                echo $product->status ? 'Available' : 'Not Available';
            @endphp
            </p>
        </div>
    </div>
</div>
    
@endsection
