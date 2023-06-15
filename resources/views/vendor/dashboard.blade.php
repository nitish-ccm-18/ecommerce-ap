@extends('layouts.app')

@section('title')
    Vendor Dashboard
@endsection


@section('content')
    <h1 class="text-center">Welcome to Vendor Dashboard</h1>
    <div class="row justify-content-center">
        <div class="card text-white bg-primary mb-3 mx-1 text-center" style="max-width: 18rem;">
            <div class="card-header">Product Count</div>
            <div class="card-body">
              <h5 class="card-title ">Total {{ $product_count }}</h5>
            </div>
        </div>
        <div class="card text-white bg-primary mb-3 mx-1 text-center" style="max-width: 18rem;">
            <div class="card-header">Category Count</div>
            <div class="card-body">
              <h5 class="card-title ">Total {{ $category_count }}</h5>
            </div>
        </div>
    
        <div class="card text-white bg-primary mb-3 mx-1 text-center" style="max-width: 18rem;">
            <div class="card-header">Orders Count</div>
            <div class="card-body">
              <h5 class="card-title ">Total {{ $order_count }}</h5>
            </div>
        </div>
    
        <div class="card text-white bg-primary mb-3 mx-1 text-center" style="max-width: 18rem;">
            <div class="card-header">Coupon Count</div>
            <div class="card-body">
              <h5 class="card-title ">Total {{ $coupon_count }}</h5>
            </div>
        </div>
    </div>
      

    <a href="/products/create" class="btn btn-primary btn-sm">+ Products</a>
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
                            <a href="/vendors/product/{{ $product->id }}" class="btn btn-success"><i class="fa-regular fa-eye"></i></a>
                            <a href="/products/edit/{{ $product->id }}" class="btn btn-warning"><i class="fa-sharp fa-solid fa-user-pen"></i></a>
                        <td><a href="/products/status/edit/{{ $product->id }}" class="text-lg"><i class="fa-solid fa-toggle-{{ $product->status ? 'on' : 'off' }} fa-2xl"></i></a>
                        </td>
                        <td><a href="/products/feature/edit/{{ $product->id }}" class="text-lg"><i class="fa-solid fa-toggle-{{ $product->featured ? 'on' : 'off' }} fa-2xl"></i></a></td>
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
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td><a href="/categories/{{ $category->id }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></a></td>
                        <td><a href="/categories/edit/{{ $category->id }}" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-user-pen"></i></a></td>
                        <td><a href="/categories/status/edit/{{ $category->id }}"
                                class=""><i class="fa-solid fa-toggle-{{ $category->status ? 'on' : 'off' }} fa-2xl"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <a href="/coupons/create" class="btn btn-primary btn-sm">+ Coupons</a>
    {{-- Coupons Section --}}
    <div class="row">
        @foreach ($coupons as $item)
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header">{{ $item->code }}</div>
                <div class="card-body text-primary">
                    <h5 class="card-title">{{ $item->discount_value }} {{ $item->discount_type === 'fixed' ? "$" : "%" }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="cart-text">Expire On {{ $item->expiry }}</p>
                </div>
            </div>
        @endforeach
    </div>






    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Order Total</th>
                <th scope="col">Delivery Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td><a href="/vendors/order/{{$order->order_id }}">{{ $order->order_id }}</a></td>
                    <td><a href="/users/{{$order->user_id}}">{{ $order->user_name }}</a></td>
                    <td>$ {{ $order->total_price }}</td>
                    <td>
                        {{ $order->address }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


