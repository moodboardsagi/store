<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>@yield('title')</title>

        @stack('prepend-style')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <link href="{{ url('/style/main.css') }}" rel="stylesheet" />
        @stack('addon-style')
    </head>

    <body>
        <div class="page-dashboard">
            <div class="d-flex" id="wrapper" data-aos="fade-right">
                <!-- SideBar -->
                <div class="border-right mb-5 mt-5" id="sidebar-wrapper">
                    <div class="sidebar-heading text-center">
                        <img src="/images/dashboard-store-logo.svg" alt="Logo-Store" class="my-4">
                    </div>
                    <div class="list-group list-group-flush mt-5">
                        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action mb-2 {{ (request()->is('dashboard')) ? 'active' : '' }}">Dashboard</a>
                        <a href="{{ route('dashboard-product') }}" class="list-group-item mb-2 list-group-item-action {{ (request()->is('dashboard/products*')) ? 'active' : '' }}">My Products</a>
                        <a href="{{ route('dashboard-transaction') }}" class="list-group-item mb-2 list-group-item-action {{ (request()->is('dashboard/transactions*')) ? 'active' : '' }}">Transactions</a>
                        <a href="{{ route('dashboard-settings-store') }}" class="list-group-item mb-2 list-group-item-action {{ (request()->is('dashboard/settings*')) ? 'active' : '' }}">Store Settings</a>
                        <a href="{{ route('dashboard-settings-account') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/account*')) ? 'active' : '' }}">My Account</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            class="list-group-item list-group-item-action signout">
                            Sign Out
                        </a>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <!-- SideBar End -->
                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg fixed-top navbar-store" data-aos="fade-down" aria-labelledby="">
                        <div class="container-fluid">
                            <button class="btn btn-secondary me-auto d-md-none me-2" id="menu-toggle">&laquo; Menu</button>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                @auth
                                    <!-- Desktop Menu -->
                                    <ul class="navbar-nav d-none d-lg-flex">
                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                                                <img src="/images/icons-testimonial-2.png" class="rounded-circle me-2 profile-picture">
                                                Hi, {{ Auth::user()->name }}
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                                                <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item">Setting</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="dropdown-item">
                                                    Log Out
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                                                @php
                                                    $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                                @endphp
                                                @if ($carts > 0)
                                                    <img src="/images/icon-cart-filled.svg">
                                                    <div class="card-badge">{{ $carts }}</div>
                                                @else
                                                    <img src="/images/icon-cart-empty.svg">
                                                @endif
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Desktop Menu End -->
                                    <!-- Mobile Menu -->
                                    <ul class="navbar-nav d-block d-lg-none">
                                        <li class="nav-item">
                                            <a href="{{ route('dashboard') }}" class="nav-link">
                                                Hi, {{ Auth::user()->name }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('cart') }}" class="nav-link d-inline-block">
                                                Cart
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Mobile Menu End -->
                                @endauth
                            </div>
                        </div>
                    </nav>
                    <!-- Navbar End -->

                    {{-- Content --}}
                    @yield('content')

                </div>
                <!-- Page Content End -->
            </div>
        </div>
        <!-- Bootstrap core JavaScript -->
        @stack('prepend-script')
        <script src="/vendor/jquery/jquery.slim.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>
        <script>
        $('#menu-toggle').click(function (e) {
            e.preventDefault();
            $('#wrapper').toggleClass('toggled');
        })
        </script>
        @stack('addon-script')
    </body>
</html>
