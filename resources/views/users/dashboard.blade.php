@extends('layouts.users.main')

@section('title')
User Dashboard
@endsection
@section('content')
    <h1>Welcome to User Dashboard</h1>
    @php
        $orders = DB::select('SELECT 
        orders.id as order_id,
        total_price,
        coupons.code as promocode,
        CONCAT(line1,", ",line2,", ",state,", ",pincode) as address
         FROM `orders` 
         join addresses on orders.address_id = addresses.id 
         join coupons on orders.coupon_id = coupons.id 
         where orders.user_id = ?',[Auth::id()]);
    @endphp

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Order Total</th>
            <th scope="col">Delivery Address</th>
            <th>Promocode</th>
            <th scope="col">Show</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->order_id }}</td>
                <td>$ {{ $order->total_price }}</td>
                <td>{{ $order->address}}</td>
                <td>{{ $order->promocode }}</td>
                <td><a href="/users/orders/{{$order->order_id }}" class="btn"><i class="fa-regular fa-eye"></i></a></td>
            </tr>
        @endforeach
        @if (!$orders)
            <tr><td>You haven't ordered.<a href="/">Shop Here</a></td></tr>
        @endif
    </tbody>
</table>
@endsection