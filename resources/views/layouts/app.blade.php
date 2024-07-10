<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- imported links --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('asset_fo/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/fl-bigmug-line.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fo/css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app" style="margin-top: -25px;">
        <div class="site-navbar mt-4">
            <div class="container py-1">
                <div class="row align-items-center">
                    <div class="col-8 col-md-8 col-lg-4">
                        <h1 class="mb-0"><a href="{{ url('/') }}"
                                class="text-white h2 mb-0"><strong>Homeland<span
                                        class="text-danger">.</span></strong></a></h1>
                    </div>
                    <div class="col-4 col-md-4 col-lg-8">
                        <nav class="site-navigation text-right text-md-right" role="navigation">

                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                                    class="site-menu-toggle js-menu-toggle text-white"><span
                                        class="icon-menu h3"></span></a></div>

                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="active">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li><a href="buy.html">Buy</a></li>
                                <li><a href="rent.html">Rent</a></li>
                                <li class="has-children">
                                    <a href="properties.html">Properties</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="#">Condo</a></li>
                                        <li><a href="#">Property Land</a></li>
                                        <li><a href="#">Commercial Building</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                @guest
                                    @if (Route::has('login'))
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <h3 class="footer-heading mb-4">About Homeland</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero
                            atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis
                            blanditiis, minima minus odio!</p>
                    </div>



                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4">Navigations</h3>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Buy</a></li>
                                <li><a href="#">Rent</a></li>
                                <li><a href="#">Properties</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Terms</a></li>
                            </ul>
                        </div>
                    </div>


                </div>

                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">Follow Us</h3>

                    <div>
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>



                </div>

            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template
                        is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                    </p>
                </div>

            </div>
        </div>
    </footer>

    <script src="{{ asset('asset_fo/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('asset_fo/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/mediaelement-and-player.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('asset_fo/js/aos.js') }}"></script>
    <script src="{{ asset('asset_fo/js/main.js') }}"></script>
</body>

</html>
