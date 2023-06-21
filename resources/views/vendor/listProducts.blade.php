@extends('layouts.vendor.main')

@section('title')
    Vendor Dashboard
@endsection


@section('content')
<div class="container-fluid">
    <a href="/vendor/products/create" class="btn btn-primary btn-sm mb-2">+ Products</a>
    <div class="row">
        <table class="table" id="products_table">
            <thead>
                <tr>
                    <th class="text-center">Image</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Weight</th>
                    <th class="text-center">Price</th>
                    <th></th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Featured</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><img src="{{ url('public/Image/Products/' . $product->image) }}" alt="" width="100"
                                height="100"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->weight }}</td>
                        <td>$ {{ $product->price }}</td>
                        <td>
                            <a href="/vendor/products/{{ $product->id }}" class="btn btn-success"><i class="fa-regular fa-eye"></i></a>
                            <a href="/vendor/products/edit/{{ $product->id }}" class="btn btn-warning"><i class="fa-sharp fa-solid fa-user-pen"></i></a>
                        <td><a href="/vendor/products/status/edit/{{ $product->id }}" class="text-lg"><i class="fa-solid fa-toggle-{{ $product->status ? 'on' : 'off' }} fa-2xl"></i></a>
                        </td>
                        <td><a href="/vendor/products/feature/edit/{{ $product->id }}" class="text-lg"><i class="fa-solid fa-toggle-{{ $product->featured ? 'on' : 'off' }} fa-2xl"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection