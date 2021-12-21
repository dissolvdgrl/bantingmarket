<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @trixassets
</head>
<body>
    <div id="app" class="dashboard-container">
        @include('includes.dashnav')

        <header class="mt-16">
            <div class="grid">
                @yield('header')
            </div>
        </header>

        <main class="mt-16">
            <div class="container mx-auto my-8 w-4/5">
                @yield('content')
            </div>
        </main>
        <footer class="bg-black p-8">
            <div class="container w-4/5 mx-auto">
                <p class="text-xl text-white text-center">Join us at Brooklyn Mall for the highest quality banting, keto and all kinds of LCHF foods. Gluten-free, wheat-free and sugar-free!</p>
                <p class="text-sm text-white text-center my-8">Brooklyn Mall is the new home for the Pretoria Banting Market, every first and third Saturday.</p>
                <nav class="footer-nav">
                    <a href="/" class="text-white">Home</a>
                    <span class="text-lg mx-4">&#8212;</span>
                    <a href="/info" class="text-white">Info</a>
                    <span class="text-lg mx-4">&#8212;</span>
                    <a href="/recipes" class="text-white">Recipes</a>
                    <span class="text-lg mx-4">&#8212;</span>
                    <a href="/vendors" class="text-white">Vendors</a>
                    <span class="text-lg mx-4">&#8212;</span>
                    <a href="/apply" class="text-white">Apply</a>
                    <span class="text-lg mx-4">&#8212;</span>
                    <a href="/contact" class="text-white">Contact</a>
                </nav>
                <div class="stripe-full bg-white my-4"></div>
                <div class="footer-bottom">
                    <a href="https://www.facebook.com/bantingmarketpretoria123/" target="_blank"><img src="{{ asset('images/facebook_icon.svg') }}" alt=""></a>
                    <a href="https://www.instagram.com/bantingmarketpretoria/" target="_blank">                    <img src="{{ asset('images/instagram_icon.svg') }}" alt=""></a>
                    <p class="text-white text-right text-xs">
                        Copyright © 2020 Brooklyn's Banting Market. <br>
                        Design & build by <a href="https://chilldsgn.com/" target="_blank" class="text-white underline">CHD</a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
