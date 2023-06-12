@extends('layouts.app')

@section('title')
   Welcome | GetProduct 
@endsection


@section('content')
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
                  <th class="text-center">Launch</th>
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
                  <td>{{ $product->created_at }}</td>
                  <td>
                    <a href="/vendors/product/{{$product->id}}" class="btn btn-success">Show</a>
                    <a href="/products/edit/{{$product->id}}" class="btn btn-warning">Edit</a>
                    <a href="/products/{{$product->id}}" class="btn btn-primary">Active</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
</div>

@push('head')

@endpush
    
@endsection