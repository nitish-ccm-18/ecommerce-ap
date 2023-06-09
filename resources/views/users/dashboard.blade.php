@extends('layouts.app')

@section('title')
User Dashboard
@endsection
@section('content')
    <h1>Welcome to User Dashboard</h1>
    @php
        $orders = DB::select('SELECT * FROM `orders` join orderdetails on orders.id = orderdetails.order_id 
        join products on orderdetails.product_id = products.id join users on orders.user_id = users.id where orders.user_id = ?',[Auth::id()]);
        echo "<pre>";
        print_r($orders);
        echo "</pre>";
    @endphp
@endsection