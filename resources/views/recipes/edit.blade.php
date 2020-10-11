@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <p class="font-sansBold">Editing:</p>
    <h1> {{ $recipe->name }}</h1>
    <div class="stripe bg-black mb-8"></div>
    <form method="POST" action="/recipes/{{ $recipe->id }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <label for="recipe_name" class="block text-gray-600 mb-2 font-sansBold tracking-wide">Recipe name</label>
        <input type="text" id="recipe_name" value="{{ $recipe->name }}" class="shadow appearance-none border py-2 px-3" @change="slugify()">
        <input type="hidden" value="{{ $recipe->slug }}" v-model="slug" id="slug">
    </form>
@endsection
