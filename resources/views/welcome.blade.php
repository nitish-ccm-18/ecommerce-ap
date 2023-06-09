@extends('layouts.app')

@section('title')
    Welcome | GetProduct
@endsection


@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark mt-3 mb-5 shadow p-2" style="background-color: #607D8B">
        <!-- Container wrapper -->
        <div class="container-fluid">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Categories:</a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent2"
                aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse overflow-auto" id="navbarSupportedContent2">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">

                    <!-- Link -->
                    <li class="nav-item acitve">
                        <a class="nav-link text-white" href="/">All</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a href="/{{ $category->id }}" class="nav-link text-white">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <!-- Search -->
                <form class="w-auto py-1" style="max-width: 12rem">
                    <input type="search" class="form-control rounded-0" placeholder="Search" aria-label="Search">
                </form>

            </div>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <!-- Products -->
    <section>
        <div class="text-center">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                data-mdb-ripple-color="light">
                                <img src="{{ url('public/Image/Products/' . $product->image) }}" class="w-100" />
                                <a href="#!">
                                    <div class="mask">
                                        <div class="d-flex justify-content-start align-items-end h-100">
                                            <h5><span class="badge bg-dark ms-2">NEW</span></h5>
                                        </div>
                                    </div>
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="/products/{{ $product->id }}" class="text-reset">
                                    <h5 class="card-title mb-2">{{ $product->name }}</h5>
                                </a>
                                <a href="" class="text-reset ">
                                    <p>{{ $product->category->name }}</p>
                                </a>
                                <h6 class="mb-3 price">{{ $product->price }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>  
        @endsection
