@extends('layouts.app')

@section('title', 'Welcome')

@section('header')
    <p class="header-small justify-self-start">Brooklyn Mall, Pretoria</p>
    <h1 class="justify-self-start">Your one-stop <span class="font-bold">banting, keto and low carb market!</span></h1>
    <div class="bg-black sub-heading p-4 justify-self-start">
        <p class="text-white">Every 1st Saturday of the month</p>
        <img src="{{ asset('/images/flowers_2.svg') }}" alt="decorative flowers illustration">
    </div>
@endsection

@section('content')
    <section id="home" class="cards-container mt-8 mb-16 grid">
        <x-card
            titleSmall="How do I"
            title="Get there?"
            text="Brooklyn Mall Parkade Entrance 2, Veale St,Pretoria."
            link="https://goo.gl/maps/eyGdceu7MwPvCFJk6"
            linkText="Get directions"
            target="_blank"
            />

            <x-card
                titleSmall="Check out our"
                title="vendors"
                text="We're radically anti-sugar and believe in real, clean foods made by local people."
                link="/vendors"
                linkText="See our vendors"
                target=""
                />

            <x-card
                titleSmall="Get regular"
                title="updates"
                text="Follow us on social media and sign up for the newsletter."
                link="/contact"
                linkText="Find out how"
                target=""
                />

            <x-card
            titleSmall="Want to sell"
            title="Your goods?"
            text="Read our requirements and fill in the online application form."
            link="/apply"
            linkText="Get started"
            target=""
            />
    </section>

    <div class="arrow flex justify-center">
        <img src="{{ asset('images/down_arrow.svg') }}" alt="scroll for more">
    </div>

    <section id="vendors" class="my-32 grid">
        <p class="text-sm text-center">We support</p>
        <h1 class="font-bold text-center">local producers</h1>
        <div class="stripe bg-black mx-auto my-4"></div>
        <div class="vendor-icons flex justify-between flex-wrap mt-4">
            @foreach ($vendors as $vendor)
                <div class="vendor-icon mb-8">
                    <img src="/images/vendors/{{ $vendor->logo }}" alt="vendor icon">
                </div>
            @endforeach
        </div>
        <a href="/vendors" class="button justify-self-center mt-8">and many more!</a>
    </section>
    <section id="newsletter" class="mt-8 mb-32">
        <img src="{{ asset('images/flowers_3.svg') }}" alt="">
        <div class="form-container p-8 bg-dg">
            <p class="text-sm text-white">Sign up for</p>
            <h1 class="font-bold text-white">our newsletter</h1>
            <div class="stripe bg-white mb-4"></div>
            <p class="text-white my-8">Get a bi-weekly reminder to visit, which vendors are at the market and any other important information right in your inbox.</p>
            <!-- Begin Mailchimp Signup Form -->
            <div id="mc_embed_signup">
                <form action="https://bantingmarketpretoria.us18.list-manage.com/subscribe/post?u=3df78d280787b83aa8e84fc34&amp;id=442304d0e9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <div class="indicates-required text-white mb-4"><span class="asterisk">*</span> indicates required</div>
                        <div class="mc-field-group mb-4">
                            <label for="mce-EMAIL" class="font-serif font-bold text-white">Email Address  <span class="asterisk">*</span>
                        </label>
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>
                        <div class="mc-field-group mb-4">
                            <label for="mce-FNAME" class="font-serif font-bold text-white">First Name </label>
                            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                        </div>
                        <div class="mc-field-group mb-4">
                            <label for="mce-LNAME" class="font-serif font-bold text-white">Last Name </label>
                            <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_3df78d280787b83aa8e84fc34_442304d0e9" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
            </div>
            <!--End mc_embed_signup-->
        </div>
        <img src="{{ asset('images/flowers_4.svg') }}" alt="">
    </section>
@endsection
