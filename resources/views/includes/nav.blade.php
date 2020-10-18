<nav id="main-nav" class="flex">
    <div class="container mx-auto flex p-8 items-center justify-between">
        <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo">
        <button @click.prevent="toggleMenu" class="toggle-menu button">
            @{{ menuText }}
        </button>

        <div id="menu" class="flex">
            <a href="/" class="nav-link {{ Request::path() === '/' ? 'active-link' : '' }}">Home</a>
            <a href="/info" class="nav-link {{ Request::path() === 'info' ? 'active-link' : '' }}">Info</a>
            <a href="/recipes" class="nav-link {{ Request::path() === 'recipes' ? 'active-link' : '' }}">Recipes</a>
            <a href="/vendors" class="nav-link {{ Request::path() === 'vendors' ? 'active-link' : '' }}">Vendors</a>
            <a href="/apply" class="nav-link {{ Request::path() === 'apply' ? 'active-link' : '' }}">Apply</a>
            <a href="/contact" class="nav-link {{ Request::path() === 'contact' ? 'active-link' : '' }}">Contact</a>

            <!-- Right Side Of Navbar -->
            {{-- <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            </ul> --}}
        </div>
    </div>
    <div id="infobox">
        <img src="{{ asset('images/blob_1.svg') }}" alt="" class="blob_1">
        <div id="next-market">
            <img src="{{ asset('images/flowers_1.svg') }}" alt="" class="flowers">
            <p class="font-serif text-white">Next Market</p>
            <p class="font-sans text-2xl text-white">
                <span>
                    @php
                        $first = date('j', strtotime('first saturday of this month'));
                        $third = date('j', strtotime('third saturday of this month'));
                        $next = date('j', strtotime('first saturday of next month'));

                        if (date('j') <= $first) {
                            echo date('j F Y', strtotime('first saturday of this month'));
                        }
                        elseif (date('j') > $first && date('j') <= $third) {
                            echo date('j F Y', strtotime('third saturday of this month'));
                        }
                        elseif (date('j') > $third) {
                            echo date('j F Y', strtotime('first saturday of next month'));
                        }
                    @endphp
                </span>
                <span>9am - 2pm</span>
            </p>
        </div>
        @if (session('status'))
            <div class="alert alert-success bg-dg py-2">
                <p class="text-2xl font-sansBold text-white">{{ session('status') }}</p>
            </div>
        @endif
    </div>
</nav>