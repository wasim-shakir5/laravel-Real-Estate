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
