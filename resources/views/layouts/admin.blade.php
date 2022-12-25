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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
        @stack('addon-style')
    </head>

    <body>
        <div class="page-dashboard">
            <div class="d-flex" id="wrapper" data-aos="fade-right">
                <!-- SideBar -->
                <div class="border-right mb-5 mt-5" id="sidebar-wrapper">
                    <div class="sidebar-heading text-center">
                        <img src="/images/admin.png" alt="Logo-Store" class="my-4" style="max-width: 110px">
                    </div>
                    <div class="list-group list-group-flush mt-5">
                        <a href="{{ route('admin-dashboard') }}" class="list-group-item list-group-item-action mb-2 {{ (request()->is('admin')) ? 'active' : '' }}">Dashboard</a>
                        <a href="{{ route('product.index') }}" class="list-group-item mb-2 list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}">Products</a>
                        <a href="{{ route('product-gallery.index') }}" class="list-group-item mb-2 list-group-item-action {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }}">Galleries</a>
                        <a href="{{ route('category.index') }}" class="list-group-item mb-2 list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }}">Categories</a>
                        <a href="#" class="list-group-item mb-2 list-group-item-action">Transactions</a>
                        <a href="{{ route('user.index') }}" class="list-group-item mb-2 list-group-item-action {{ (request()->is('admin/user*')) ? 'active' : '' }}">Users</a>
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
                                <!-- Desktop Menu -->
                                <ul class="navbar-nav d-none d-lg-flex ms-auto">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <img src="/images/icons-testimonial-2.png" class="rounded-circle me-2 profile-picture">
                                            Hi, {{ Auth::user()->name }}
                                        </a>
                                    </li>
                                </ul>
                                <!-- Desktop Menu End -->

                                <!-- Mobile Menu -->
                                <ul class="navbar-nav float-md-none float-sm-end d-lg-none">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Hi, {{ Auth::user()->name }}
                                        </a>
                                    </li>
                                </ul>
                                <!-- Mobile Menu End -->
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
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
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
