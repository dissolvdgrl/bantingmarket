@extends('layouts.app')

@section('title', 'Info')

@section('header')
    <p class="header-small justify-self-start">Market information</p>
    <h1 class="justify-self-start">Our mission is to <span class="font-bold">connect
        you with local producers.</span></h1>
    <div class="bg-black sub-heading p-4 justify-self-start">
        <p class="text-white">Every 1st Saturday of the month</p>
        <img src="{{ asset('/images/flowers_2.svg') }}" alt="decorative flowers illustration">
    </div>
@endsection

@section('content')
    <p>If you are a dedicated banter, trying to cut out sugar, high carbs and embracing high fat foods, or just someone who strives to live a healthier lifestyle, Brooklyn's Banting Market located in Pretoria will cater for your needs.</p>
    <p class="font-serif text-3xl italic mt-8">We prefer the products to be grown, baked and processed by the stallholder.</p>
    <p class="my-8">The Banting Market is the true answer to healthy food not found in supermarket shopping. You can create an entire meal by purchasing from our selected vendors!</p>
    <p class="my-8">Bring your reusable shopping bags too :)</p>
    <p class="my-8">Unfortunately no pets are allowed.</p>

    <p class="text-sm text-center mt-32">Don't miss out!</p>
    <h1 class="font-bold text-center">Stay up to date</h1>
    <div class="stripe bg-black mx-auto my-4"></div>

    <div class="grid md:grid-cols-3 mx-auto cards-container">
        <x-card
            titleSmall="Follow us on"
            title="Facebook"
            text="Get instant updates and reminders by following us on Facebook."
            link="https://www.facebook.com/bantingmarketpretoria123/"
            linkText="Visit our Facebook"
            target="_blank"
        />

        <x-card
            titleSmall="Follow us on"
            title="Instagram"
            text="Check out our awesome vendors and venue on our Instagram page."
            link="https://www.instagram.com/bantingmarketpretoria/"
            linkText="Visit our Instragram"
            target="_blank"
        />

        <x-card
            titleSmall="Sign up for our"
            title="Newsletter"
            text="Get a bi-weekly reminder to visit, which vendors are selling and any other important info."
            link="http://eepurl.com/dzNJ3v"
            linkText="Sign up now"
            target="_blank"
        />
    </div>
@endsection