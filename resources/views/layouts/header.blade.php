<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container">    
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent1"
        aria-controls="navbarSupportedContent1"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent1">      
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-sm-0" href="https://mdbootstrap.com/">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="20"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link " href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/docs/standard/">About MDB</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://mdbootstrap.com/docs/standard/getting-started/installation/">Free download</a>
          </li>
          @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <a class="nav-link" href="/login">Login</a>
                @endif
                </li>
        </ul>
        <!-- Left links -->      
      </div>
      <!-- Collapsible wrapper -->
      
      <!-- Right elements -->
      @if (session('cart'))
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="nav-link me-3" href="/cart">
          <i class="fas fa-shopping-cart"></i>
          <span class="badge rounded-pill badge-notification bg-danger">{{ null !== Session::get('cart') ? count((array) Session::get('cart')) : 0 }}</span>
        </a>
      @endif
       
      <!-- Right elements -->
      
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>


                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <a class="nav-link" href="/login">Login</a>
                @endif
                </li>

            </ul>
            @if (session('cart'))
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="/cart" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Cart {{ null !== Session::get('cart') ? count((array) Session::get('cart')) : 0 }}
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        @php $total = 0 @endphp
                        @foreach ((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <p>Total: <span class="text-info">Rs. {{ $total }}</span></p>
                    </li>
                    <li>
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-lg-3 col-sm-4 col-4 cart-detail-img">
                                        <img src="{{ url('public/Image/Products/' . $details['image']) }}" width="50px"
                                            height="50px" />
                                    </div>
                                    <div class="col-lg-6 col-sm-8 col-8 cart-detail-product">
                                        <p>{{ $details['name'] }}</span></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-8 col-8 cart-detail-product">
                                        <p><span class="bg-dark text-white">{{ $details['quantity'] }}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('cart') }}" class="btn btn-primary btn-sm">View all</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>  
            @endif
        </div>
    </div>
</nav>
