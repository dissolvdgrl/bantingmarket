@extends('layouts.dashboard')

@section('title', 'Recipes')

@section('header')
    <p class="header-small justify-self-start">Viewing all</p>
    <h1 class="justify-self-start font-bold">Recipes</h1>
@endsection

@section('content')
    @if (session('status'))
    <div class="alert bg-dg text-white text-2xl mb-4 w-1/3 shadow-xl p-4">
        {{ session('status') }}
    </div>
    @endif
    <p>We current have <span class="font-sansBold"> {{ count($recipes) }}</span> recipes in our database.</p>
    <a href="/recipes/create" class="button my-4 w-1/5 text-center">Create a new recipe</a>
    <div class="dash-recipes-container grid grid-cols-4 gap-8 mt-8">
        @foreach ($recipes as $recipe)
            <div class="card p-2 flex flex-col">
                <img src="{{ asset('/images/recipes/'. $recipe->image) }}" alt="{{ $recipe->name }}">
                <p class="font-sansBold mt-4">{{ $recipe->name }}</p>
                <p>{{ $recipe->description }}</p>
                <div class="mt-auto">
                    <a href="/recipes/{{ $recipe->slug }}/edit/" class="button mt-4 text-center">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection