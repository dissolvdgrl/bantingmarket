<nav id="main-nav" class="flex flex-col">
    <div class="container flex flex-col items-end dashnav mx-auto">
         <!-- Authentication Links -->
         @guest
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
         @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
         @endif
     @else
        <p>Hello <span class="underline">{{ Auth::user()->name }}</span></p>

        <a class="link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
     @endguest
    </div>
    <div class="container mx-auto flex items-center justify-between dashnav">
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
        </div>
    </div>
</nav>