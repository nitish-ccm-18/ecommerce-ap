@extends('layouts.app')

@section('title')
    User Dashboard
@endsection
@section('content')

    @if (Auth::check() && session('cart'))
        @php $total = 0 @endphp
        @foreach (session('cart') as $id => $details)
            <div class="row w-25 cart-detail mb-2">
                <div class="col-lg-3 col-sm-4 col-4 cart-detail-img">
                    <img src="{{ url('public/Image/Products/' . $details['image']) }}" width="50px" height="50px" />
                </div>
                <div class="col-lg-6 col-sm-8 col-8 cart-detail-product">
                    <p>{{ $details['name'] }}</span></p>
                </div>
                <div class="col-lg-3 col-sm-8 col-8 cart-detail-product">
                    <p><span class="bg-dark text-white">{{ $details['quantity'] }}</span></p>
                </div>
            </div>
            @php $total += $details['price'] * $details['quantity'] @endphp
        @endforeach
        Total {{ $total }}
        <div class="row">
            @foreach ($addresses as $address)
            <div>
                <label>{{ $address->tag}}</label>
                <input type="radio" name="address" value="{{ $address->id }}">{{$address->line1.",".$address->line2.",".$address->city.",".$address->state.",".$address->pincode}}
            </div>
                
            @endforeach
        </div>

        <a href="/order" class="btn btn-primary">Order</a>
    @endif


@endsection
