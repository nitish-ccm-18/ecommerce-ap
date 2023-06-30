<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-sm-0" href="/">
                e-Commerce
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item"
                                    href="{{ Auth::user()->type === 'admin' ? '/vendors/dashboard' : '/users/dashboard' }}">Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ Auth::user()->type === 'admin' ? '/vendors/profile' : '/users/profile' }}">My
                                    Profile</a>
                            </li>
                            <li><a class="dropdown-item" href="/logout"><i
                                        class="fa-solid fa-arrow-up-left-from-circle"></i>Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login">
                            Login
                        </a>
                    </li>
                @endif
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="nav-link me-3" href="/cart">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart" class="badge rounded-pill badge-notification bg-danger"></span>
            </a>
        </div>

        <!-- Right elements -->
        <!-- Container wrapper -->
</nav>
<!-- Navbar ends here -->
