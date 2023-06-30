<!-- User Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">e-commerce</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item nav-item {{ (request()->is('users/dashboard')) ? 'active' : '' }}">
        <a class="nav-link" href="/users/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Orders -->
    <li class="nav-item  {{ (request()->is('user/orders')) ? 'active' : '' }}">
        <a class="nav-link" href="/user/orders">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Orders</span></a>
    </li>
    <!-- Nav Item - Coupons -->
    <li class="nav-item {{ (request()->is('user/coupons')) ? 'active' : '' }}">
        <a class="nav-link" href="/user/orders">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Coupons</span></a>
    </li>

    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->