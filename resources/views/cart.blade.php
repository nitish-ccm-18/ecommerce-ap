@extends('layouts.app')

@section('title')
   Welcome | GetProduct 
@endsection


@section('content')

<div class="row">
        <table class="table" id="products_table">
          <thead>
              <tr>
                  <th class="text-center">Name</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Image</th>
              </tr>
          </thead>
          <tbody>
            @foreach (Session::get('cart') as $product)
              <tr>
                  <td>{{ $product['name'] }}</td>
                  <td>{{ $product['quantity'] }}</td>
                  <td>{{ $product['price'] }}</td>
                  <td><img src="{{ url('public/Image/Products/'.$product['image'])}}" alt="" width="100" height="100"></td>
                  <td><a href="" class="btn btn-warning btn-sm">Update</a></td>
                  <td><a href="/cart/remove/{{ $product['id'] }}" class="btn btn-danger btn-sm">Delete</a></td>
              </tr>
              @endforeach
          </tbody>
      </table>
</div>

@push('head')

@endpush
    
@endsection