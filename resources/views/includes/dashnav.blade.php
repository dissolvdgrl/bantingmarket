<nav id="main-nav" class="flex flex-col">
    <div class="container flex dashnav mx-auto border-b border-black pb-4">
         <!-- Authentication Links -->
    @guest
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
     @else
        <div class="flex flex-col mr-8">
            <p class="self-center ">Hello <span class="underline font-sansBold">{{ Auth::user()->name }}</span>!</p>
            <p class="text-xs">{{ __('You are logged in.') }}</p>
        </div>
        <div class="flex justify-between self-end">
            <a href="/" class="nav-link {{ Request::path() === '/' ? 'active-link' : '' }}" target="_blank">View frontend</a>
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
     @endguest
    </div>
</nav>