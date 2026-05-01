<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">
        <i class="fa-solid fa-bolt"></i> Devsolar
    </div>

    <!-- MENU -->
    <ul class="menu">

        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li><a href="{{ route('categories.index') }}"><i class="fa-solid fa-users"></i> <span>Categories</span></a></li>
        <li><a href="{{ route('products.index') }}"><i class="fa-solid fa-box"></i> <span>Products</span></a></li>
        <li><a href="{{ route('orders.index') }}"><i class="fa-solid fa-cart-shopping"></i> <span>Orders</span></a></li>
         <li><a href="{{ route('coupons.index') }}"><i class="fa-solid fa-ticket-simple"></i> <span>Coupon</span></a></li>
        <li><a href="{{ route('user.index') }}"><i class="fa-solid fa-users"></i> <span>Users</span></a></li>
        <li><a href="{{ route('abandoned-checkouts.index') }}"><i class="fa-solid fa-gear"></i> <span>Abandoned Checkouts</span></a></li>
        <!-- <li><a href="#"><i class="fa-solid fa-file"></i> Pages</a></li>
        <li><a href="#"><i class="fa-solid fa-lock"></i> Permissions</a></li> -->

    </ul>

    <!-- LOGOUT -->
    <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </div>

</div>