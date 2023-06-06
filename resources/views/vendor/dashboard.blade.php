@extends('layouts.app')

@section('title')
Vendor Dashboard
@endsection


@section('content')
    <h1 class="text-center">Welcome to Vendor Dashboard</h1>
    <div class="d-flex justify-content-between">
        <div>
            <h2>Product Count{{$product_count}}</h2>
            <ul>
                @foreach ($products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h2>Category Count{{$category_count}}</h2>
            <ul>
                @foreach ($categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>

<a href="/products/create" class="btn btn-primary btn-sm">+ Products</a>
<div class="row">
        <table class="table" id="products_table">
          <thead>
              <tr>
                  <th class="text-center">Name</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-center">Weight</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Image</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->weight }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->status ? "Active" : "Inactive" }}</td>
                  <td><img src="{{ url('public/Image/Products/'.$product->image)}}" alt="" width="100" height="100"></td>
                  <td>
                    <a href="/products/{{$product->id}}" class="btn btn-success">Show</a>
                    <a href="/products/edit/{{$product->id}}" class="btn btn-warning">Edit</a>
                    <td><a href="/products/status/edit/{{ $product->id }}" class="btn {{$product->status ? 'btn-success' : 'btn-danger' }}">{{$product->status ? "Active" : "Inactive" }}</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
</div>

<a href="/categories/create" class="btn btn-primary btn-sm">+ Categories</a>
<div class="row">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th></th>
            <th></th>
            <th scope="col">Status <small class="text-muted">Press Button to change status</small></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td><a href="/categories/{{ $category->id }}" class="btn btn-primary btn-sm">Show</a></td>
                <td><a href="/categories/edit/{{ $category->id }}" class="btn btn-primary btn-sm">Edit</a></td>
                <td><a href="/categories/status/edit/{{ $category->id }}" class="btn {{$category->status ? 'btn-success' : 'btn-danger' }}">{{$category->status ? "Active" : "Inactive" }}</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table> 
</div>




{{-- Coupons Section --}}
@foreach ($coupons as $item)
    <div class="row">
        <div class="card border-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">{{ $item->code }}</div>
            <div class="card-body text-primary">
              <h5 class="card-title">Rs. {{ $item->discount_value }}</h5>
              <p class="card-text">{{ $item->description}}</p>
              <p class="cart-text">{{ $item->expiry }}</p>
            </div>
          </div>
    </div>
@endforeach






    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">User Id</th>
            <th scope="col">Order Id</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $id=>$order)
            <tr>
                <th scope="row">{{ $id }}</th>
                <td>{{ $order->name}}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->id }}</td>
              </tr>
            {{ $order->id }}
        @endforeach
         
        </tbody>
      </table>

      @endsection
      
     