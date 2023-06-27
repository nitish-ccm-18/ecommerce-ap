@extends('layouts.vendor.main')

@section('title')
    Vendor Dashboard
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush
@section('content')
{{-- {{ dd($orders)}} --}}
<div class="container-fluid">
    <table class="table" id="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Order Total</th>
                <th class="text-center">Coupon</th>
                <th class="text-center">Discount</th>
                <th scope="col">Delivery Address</th>
                <th scope="col">Show</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td><a href="/users/{{$order->user->id}}">{{ $order->user->name }}</a></td>
                    <td>$ {{ $order->total_price }}</td>
                    <td>{{ $order->coupon ? $order->coupon->code : 'None' }}</td>
                    <td>
                      {{ $order->coupon ? $order->coupon->discount_value : '' }}
                      @isset($order->coupon)
                          {{ $order->coupon && $order->coupon->discount_type == 'fixed' ? '$' : '%' }}
                      @endisset
                    </td>
                    <td>
                        {{ $order->address->full_address }}
                    </td>
                    <td><a href="/vendor/orders/{{$order->id }}" class="btn"><i class="fa-regular fa-eye"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('head')
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            dom: '<"top"fi>rt<"bottom"p><"clear">',
        });
    });
</script>
@endpush