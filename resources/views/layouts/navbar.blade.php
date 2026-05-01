<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" class="logo-img" alt="Logo">
            </a>

            <!-- Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>

                    <!-- About -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ url('about-us') }}">About</a>
                    </li>

                    <!-- Products -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('products*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
                            Products
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('solar-panel') }}">Solar Panel</a></li>
                            <li><a class="dropdown-item" href="{{ url('hybrid-8g-inverter') }}">Hybrid 8G inverter</a></li>
                            <li><a class="dropdown-item" href="{{ url('hybrid-9g-inverter') }}">Hybrid 9G inverter</a></li>
                            <li><a class="dropdown-item" href="{{ url('lithium-po4-battery') }}">Lithium PO4 Battery</a></li>
                            <li><a class="dropdown-item" href="{{ url('solar-hybrid-ac') }}">Solar Hybrid AC</a></li>
                            <li><a class="dropdown-item" href="{{ url('solar-c10-battery') }}">Solar C10 Battery</a></li>
                        </ul>
                    </li>

                    <!-- Blog -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" href="{{ url('blog') }}">Blog</a>
                    </li>

                    <!-- Gallery -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="{{ url('gallery') }}">Gallery</a>
                    </li>

                    <!-- Contact -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" href="{{ url('contact-us') }}">Contact</a>
                    </li>

                 

                    <!-- Cart -->
                    <li class="nav-item position-relative ms-lg-3">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            @php $cartCount = count(session('cart', [])); @endphp
                            @if($cartCount > 0)
                            <span class="cart-count">
                                {{ session('cart') ? count(session('cart')) : 0 }}
                            </span>
                             @endif
                        </a>
                    </li>

                    <!-- Auth -->
                    @guest
                        <li class="nav-item ms-lg-2">
                            <a class="nav-link btn-login" href="{{ route('login') }}">
                                <i class="fa-regular fa-user"></i> Login
                            </a>
                        </li>

                        <li class="nav-item ms-lg-2">
                            <a class="nav-link btn-register" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                                <img src="{{ auth()->user()->avatar_url ?? asset('img/default-avatar.png') }}"
                                     class="rounded-circle me-1" style="width:24px;height:24px;">
                                {{ auth()->user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                 @if(auth()->user()->role === 'admin')
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Admin Panel
                                </a>
                            </li>
                            @else
                            <li>
                                <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                    <i class="fas fa-box me-2"></i>My Orders
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.addresses.index') }}">
                                    <i class="fas fa-map-marker-alt me-2"></i>Addresses
                                </a>
                            </li>
                            @endif
                                <li>
                                     <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="fas fa-user-edit me-2"></i> Profile
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>