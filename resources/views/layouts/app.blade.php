<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Salon Management System') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('admin/images/hairsalon.png') }}" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendor/owl-carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('user/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/main.css') }}">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    {{-- favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('dist/img/logo2bg.png') }}">

</head>

<body>
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top bg-white">
            <div class="container">
                <img src="user/img/logo2.png" alt="" style="max-height: 100%; max-width: 70px;">
                <a class="navbar-brand"href="{{ url('/') }}" style="color:#00D9A5;">LUCY ROSE SALON</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link{{ Request::route()->getName() === 'frontend.home' ? ' active' : '' }}"
                                href="{{ route('frontend.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('about') ? ' active' : '' }}" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('services') ? ' active' : '' }}"
                                href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('testimonials') ? ' active' : '' }}"
                                href="#testimonials">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::is('contact') ? ' active' : '' }}"
                                href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::route()->getName() === 'frontend.status' ? ' active' : '' }}"
                                href="{{ route('frontend.status') }}">Booking Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ Request::route()->getName() === 'reviews.addreviews' ? ' active' : '' }}"
                                href="{{ route('reviews.addreviews') }}">Customer Reviews</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link{{ Request::route()->getName() === 'customerlogin' ? ' active' : '' }}"
                                href="{{ route('customerlogin') }}">Customer Login</a>
                        </li> --}}

                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-light ml-lg-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-light ml-lg-4"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>
    </header>


    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{ asset('user/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('user/js/theme.js') }}"></script>

</body>

</html>
