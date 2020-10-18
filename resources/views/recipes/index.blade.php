@extends('layouts.app')

@section('title', 'Recipes')

@section('header')
<p class="header-small justify-self-start">Low-carb/Banting/Keto</p>
<h1 class="justify-self-start">What's cookin',<br><span class="font-bold">good lookin'?</span></h1>
<div class="bg-black sub-heading p-4 justify-self-start">
    <p class="text-white font-sansBold">Healthy doesn't have to be bland</p>
    <img src="{{ asset('/images/flowers_2.svg') }}" alt="decorative flowers illustration">
</div>
@endsection

@section('content')
    <p>We've collected some of our favourite recipes below and you can buy some of the ingredients at our market!</p>
    <p class="font-serif text-3xl italic my-16">Eating healthy doesn't have to be boring and bland. Get cooking today!</p>

    <div class="recipes-container mt-8">
        @foreach ($recipes as $recipe)
            <x-recipe-card
                name="{{ $recipe->name }}"
                image="{{ $recipe->image }}"
                slug="{{ $recipe->slug }}"
            />
        @endforeach
    </div>
@endsection