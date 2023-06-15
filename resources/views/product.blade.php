@extends('layouts.app')

@section('title')
    Welcome | GetProduct
@endsection

@section('content')
<main class="mt-5 pt-4">
    <div class="container mt-5">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-6 mb-4">
                <img src="{{ url('public/Image/Products/' . $product->image) }}" width="200px" height="200px" alt="" />
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6 mb-4">
                <!--Content-->
                <div class="p-4">
                    <div class="mb-3">
                        <a href="">
                            <span class="badge bg-dark me-1">{{ $category->name }}</span>
                        </a>
                        <a href="">
                            <span class="badge bg-info me-1">New</span>
                        </a>
                        <a href="">
                            <span class="badge bg-danger me-1">Bestseller</span>
                        </a>
                    </div>

                    <p class="lead">
                        <span class="me-1">
                            <del>$ {{ $product->price }}</del>
                        </span>
                        <span>${{ $product->sale_price }}</span>
                    </p>

                    <strong>
                        <p style="font-size: 20px;">Description</p>
                    </strong>

                    <p>{{ $product->description}}</p>

                    <form action="/cart/add/{{ $product->id }}" class="d-flex justify-content-left">
                        <!-- Default input -->
                        <div class="form-outline me-1" style="width: 100px;">
                            <input type="number" value="1" min="1" class="form-control" name="quantity" />
                        </div>
                        <button type="submit" class="btn btn-primary ms-1">
                            Add to cart
                            <i class="fas fa-shopping-cart ms-1"></i>
                        </button>
                    </form>
                </div>
                <!--Content-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->

        <hr />

</main>  
@endsection
<!--Main layout-->
