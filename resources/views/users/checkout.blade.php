@extends('layouts.app')

@section('title')
    User Dashboard
@endsection

@section('content')
    {{-- Saving Current User Details --}}
    @php
        $user = Auth::user();
        $total = 0;
    @endphp

    @foreach (session('cart') as $id => $details)
        @php $total += $details['price'] * $details['quantity'] @endphp
    @endforeach

    @if (session('discount'))
        {{-- Discount Calculation --}}
        @if (session('type') === 'fixed')
            @php $total = $total- session('discount') @endphp
        @else
            @php $total = $total- ($total*session('discount'))/100 @endphp
        @endif
    @endif


    <!--Main layout-->
    <div class="container">
        <!-- Heading -->
        <h2 class="my-5 text-center">Checkout form</h2>
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-8 mb-4">
                <!--Card-->
                <div class="card p-4">

                    <!--email-->
                    <p class="mb-0">
                        Full Name
                    </p>
                    <div class="form-outline mb-4">
                        <input type="email" class="form-control" placeholder="youremail@example.com"
                            aria-label="youremail@example.com" aria-describedby="basic-addon1" value="{{ $user->name }}"
                            readonly />
                    </div>

                    <!--email-->
                    <p class="mb-0">
                        Email (optional)
                    </p>
                    <div class="form-outline mb-4">
                        <input type="email" class="form-control" placeholder="youremail@example.com"
                            aria-label="youremail@example.com" aria-describedby="basic-addon1" value="{{ $user->email }}"
                            readonly />
                    </div>
                    <form action="/checkout" method="post">
                        @csrf


                        <input type="number" name="coupon_id" value='{{ session('coupon_id') }}'>
                        <input type="hidden" name="total_price" value="{{ $total }}">
                        <div class="form-outline mb-4">
                            <select name="address_id" id="" class="form-control" required>
                                <option value="">Choose Your Address</option>
                                @foreach ($addresses as $address)
                                    <label>{{ $address->tag }}</label>
                                    <option value="{{ $address->id }}">
                                        <strong>{{ $address->tag }} </strong>
                                        {{ $address->line1 . ',' . $address->line2 . ',' . $address->city . ',' . $address->state . ',' . $address->pincode }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <a href="/address/new" class="btn btn-primary btn-sm mb-2">+ Address</a>
                        </div>
                        <hr class="mb-4" />
                        <button class="btn btn-primary" type="submit">Continue to checkout</button>
                </div>
                </form>
                <!--/.Card-->
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">
                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge rounded-pill badge-primary">3</span>
                </h4>

                <!-- Cart -->
                <ul class="list-group mb-3" id="cart">
                    @foreach (session('cart') as $id => $details)
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h6 class="my-0">{{ $details['name'] }}</h6>
                                <span class="text-muted">NOS : {{ $details['quantity'] }}</span>
                            </div>
                            <small class="text-muted">${{ $details['price'] }}</small>
                        </li>
                    @endforeach

                    {{-- If coupon is valid --}}
                    @if (session('discount'))
                        {{ session('discount') }}
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>Discount {{ session('discount') }} {{ session('type') == 'fixed' ? 'Rs' : '%' }}
                                </small>
                            </div>
                            <span class="text-success">{{ session('code') }}</span>
                        </li>
                    @endif

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{ $total }}</strong>
                    </li>
                </ul>
                <!-- Cart -->

                <!-- Promo code -->
                <form method="POST" action="/coupons/validate" class="card p-2">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Promo code" aria-label="Promo code"
                            aria-describedby="button-addon2" id="coupon_code" name="coupon_code" />
                        <button class="btn btn-primary" id="coupon_code_btn" type="submit" data-mdb-ripple-color="dark">
                            Reedem
                        </button>
                    </div>
                </form>
                <!-- Promo code -->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    </main>
    <!--Main layout-->
@endsection
