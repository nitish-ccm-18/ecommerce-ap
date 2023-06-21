@extends('layouts.app')

@section('title')
    User Dashboard
@endsection

@section('content')
<div class="alert alert-info d-none" id="coupon_status">
</div>
    {{-- Saving Current User Details --}}
    @php
        $user = Auth::user();
        $total = 0;
    @endphp

    @foreach (session('cart') as $id => $details)
        @php $total += $details['price'] * $details['quantity'] @endphp
    @endforeach



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
                        Email
                    </p>
                    <div class="form-outline mb-4">
                        <input type="email" class="form-control" placeholder="youremail@example.com"
                            aria-label="youremail@example.com" aria-describedby="basic-addon1" value="{{ $user->email }}"
                            readonly />
                    </div>
                    <form action="/checkout" method="post">
                        @csrf


                        <input type="hidden" name="coupon_id" value="{{ session()->has('coupon') ? session()->get('coupon')['id'] : '' }}">
                        <input type="hidden" name="total_price" value="{{ $total }}" id="total_checkout_value">
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
                            <small class="text-muted">$ {{ $details['price'] }}</small>
                        </li>
                    @endforeach

                    {{-- If coupon is valid --}}
                        <li class="list-group-item d-flex justify-content-between bg-light d-none" id="coupon_card">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>Discount <span id="coupon_value"></span>  <span id="coupon_type"></span>  </small>
                            </div>
                            <span class="text-success" id="coupon_code"></span>
                            <button type="button" class="btn" id="remove_coupon"><i class="fa-solid fa-minus"></i></button>
                        </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span >Total (USD)</span>
                            <strong id="total_order_value"></strong>
                    </li>
                </ul>
                <!-- Cart -->

                <!-- Promo code -->
                <form method="POST" action="/coupons/validate" class="card p-2" id="coupon_code_input">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Promo code" aria-label="Promo code"
                            aria-describedby="button-addon2" id="coupon-code" name="coupon_code" />
                        <button class="btn btn-primary" id="apply_coupon" type="button" data-mdb-ripple-color="dark">
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
    @push('head')
        <script>
            $( document ).ready(function() {
                checkCoupon();
            });

            // Function to check coupon is applied or not
            function checkCoupon(){
                $.ajax({
                    method : 'get',
                    url : '/coupon/check',
                    success : function(response) {
                        console.log(response)
                           if(response.coupon_code) {
                                console.log(response)
                               $('#coupon_card').removeClass('d-none');
                               $('#coupon_value').html(response.coupon_value);
                               $('#coupon_code').html(response.coupon_code);
                               $('#coupon_type').html(response.coupon_type == 'fixed' ? '$' : '%');
                               $('#coupon_code_input').addClass('d-none');
                           }
                           $('#total_order_value').html("$ "+response.total);
                    }
                })
            }

            // Function to add coupon
            $("#apply_coupon").click(function(e){
               
                $.ajax({
                    method : 'post',
                    url : '/coupons/validate',
                    data : {
                        _token : "{{ csrf_token()}}",
                        coupon_code : $('#coupon-code').val(),
                    },
                    success : function(response) {
                        $('#coupon_status').removeClass('d-none');
                        if(response.status == 'COUPON_INVALID') {
                            $('#coupon_status').html('Invalid Coupon');
                        }else {
                            checkCoupon();
                            $('#coupon_status').html('Coupon Applied');
                        }

                        setTimeout(() => {
                            $('#coupon_status').addClass('d-none');
                        }, 1000);
                    }
                });
            });

            // Function to remove coupon
            $('#remove_coupon').click(function(e){
                $.ajax({
                    method : 'get',
                    url : '/coupon/remove',
                    success : function(response){
                        console.log(response.COUPON_STATUS)
                        console.log("COUPON_DELETED")
                        if(response.COUPON_STATUS == 'COUPON_DELETED') {
                            $('#total_order_value').html(response.total);
                            $('#coupon_code_input').removeClass('d-none');
                            $('#coupon_card').addClass('d-none');
                            $('#coupon_status').html('Coupon Deleted');
                        }else {
                            $('#coupon_status').html('Techincal Error');
                        }
                    }
                })
            });
        </script>
    @endpush
@endsection
