@extends('layouts.app')

@section('title', 'Vendors')

@section('header')
    <p class="header-small justify-self-start">Market Vendors</p>
    <h1 class="justify-self-start">Buy the <span class="font-bold">best low-carb products at the next market!</span></h1>
    <div class="bg-black sub-heading p-4 justify-self-start">
        <a href="/apply" class="text-white font-sansBold">Want to sell?</a>
        <img src="{{ asset('/images/flowers_2.svg') }}" alt="decorative flowers illustration">
    </div>
@endsection

@section('content')
    <p>Looking for the finest low-carb/banting/ketogenic foods? You've come to the right place! </p>
    <p class="mt-8">Don't forget your reusable shopping bags :)</p>

    <div class="vendors-container">
        @foreach ($vendors as $vendor)
            <x-vendor-card
                name="{{ $vendor->name }}"
                logo="{{ $vendor->logo }}"
                description="{{ $vendor->description }}"
                website="{{ $vendor->website }}"
            />
        @endforeach
    </div>
@endsection