@extends('layouts.app')

@section('title')
    Welcome | GetProduct
@endsection

{{ $product }}
@section('content')
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ url('public/Image/Products/' . $product->image) }}" alt="Product image">
        <div class="card-body">
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
@endsection
