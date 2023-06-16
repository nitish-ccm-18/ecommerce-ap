@extends('layouts.vendor.main')

@section('title')
    Vendor Dashboard
@endsection


@section('content')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Order Total</th>
            <th scope="col">Delivery Address</th>
            <th scope="col">Show</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->order_id }}</td>
                <td><a href="/users/{{$order->user_id}}">{{ $order->user_name }}</a></td>
                <td>$ {{ $order->total_price }}</td>
                <td>
                    {{ $order->address }}
                </td>
                <td><a href="/vendor/orders/{{$order->order_id }}" class="btn"><i class="fa-regular fa-eye"></i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection