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
                        <li class="{{ Request::is('/')? 'active' : '' }}">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        @if (Auth::check())
                            <li class="{{ Request::is('property/type/Sale')? 'active' : '' }}">
                                <a href="{{ route('property.type', 'Sale') }}">Sale</a>
                            </li>
                            <li class="{{ Request::is('property/type/Rent')? 'active' : '' }}">
                                <a href="{{ route('property.type', 'Rent') }}">Rent</a>
                            </li>
                            <li class="has-children {{ Request::is('property/home-type/*')? 'active' : '' }}">
                                <a href="#">Properties</a>
                                <ul class="dropdown arrow-top">
                                    <li class="{{ Request::is('property/home-type/Palace')? 'active' : '' }}">
                                        <a href="{{ route('property.hometype', 'Palace') }}">Palace</a>
                                    </li>
                                    <li class="{{ Request::is('property/home-type/Mansion')? 'active' : '' }}">
                                        <a href="{{ route('property.hometype', 'Mansion') }}">Mansion</a>
                                    </li>
                                    <li class="{{ Request::is('property/home-type/Home')? 'active' : '' }}">
                                        <a href="{{ route('property.hometype', 'Home') }}">Home</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="{{ Request::is('about-us')? 'active' : '' }}">
                            <a href="{{ route('about') }}">About</a>
                        </li>
                        <li class="{{ Request::is('contact')? 'active' : '' }}">
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="{{ Request::is('login')? 'active' : '' }}">
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="{{ Request::is('register')? 'active' : '' }}">
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="has-children">
                                <a href="#">{{ Auth::user()->name }}</a>
                                <ul class="dropdown arrow-top">
                                    <li class="{{ Request::is('/requested-property') ? 'active' : '' }}">
                                        <a href="{{ route('requested.property') }}">Requested Property</a>
                                    </li>
                                    <li class="{{ Request::is('/liked-property') ? 'active' : '' }}">
                                        <a href="{{ route('liked.property') }}">Liked Property</a>
                                    </li>
                                    <hr style="margin:5px 10px">
                                    <li class="{{ Request::is('/logout') ? 'active' : '' }}">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
