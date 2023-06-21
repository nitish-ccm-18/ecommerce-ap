<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Vendor Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is('vendor/dashboard')) ? 'active' : '' }}">
        <a class="nav-link"
            href="/vendor/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->is('vendor/categories')) ? 'active' : '' }}">
        <a class="nav-link" href="/vendor/categories">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Categories</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ (request()->is('vendor/products')) ? 'active' : '' }}">
        <a class="nav-link" href="/vendor/products">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ (request()->is('vendor/coupons')) ? 'active' : '' }}">
        <a class="nav-link" href="/vendor/coupons">
            <i class="fas fa-fw fa-table"></i>
            <span>Coupons</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ (request()->is('vendor/orders')) ? 'active' : '' }}">
        <a class="nav-link" href="/vendor/orders">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->