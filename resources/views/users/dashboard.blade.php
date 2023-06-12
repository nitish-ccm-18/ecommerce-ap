@extends('layouts.app')

@section('title')
User Dashboard
@endsection
@section('content')
    <h1>Welcome to User Dashboard</h1>
    @php
        $orders = DB::select('SELECT * FROM `orders`  where user_id = ?',[Auth::id()]);
        echo "<pre>";
        print_r($orders);
        echo "</pre>";
    @endphp

    <ul>
        @foreach ($orders as $order)
            <li></li>
        @endforeach
    </ul>
@endsection