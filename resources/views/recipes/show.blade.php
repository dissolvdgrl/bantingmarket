@extends('layouts.app')

@section('header')

    <a href="{{ URL::previous() }}" class="link-back mb-4">Go back</a>
    <h1 class="justify-self-start">{{ $recipe->name }}</h1>
    <img src="/images/recipes/{{ $recipe->image }}" alt="" class="recipe-img mb-4">
@endsection

@section('content')
    <div class="recipe-content">
        {!! $recipe->content !!}
    </div>
@endsection