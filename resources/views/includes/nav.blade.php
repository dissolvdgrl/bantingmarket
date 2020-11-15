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

                        if (date('j') <= $first)
                        {
                            echo date('j F Y', strtotime('first saturday of this month'));
                        }
                        else
                        {
                            echo date('j F Y', strtotime('first saturday of next month'));
                        }
                    @endphp
                </span>
                <span>9am - 2pm</span>
            </p>
        </div>
    </div>
</nav>