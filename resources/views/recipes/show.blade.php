@extends('layouts.app')

@section('content')
    <a href="{{ URL::previous() }}" class="link-back mb-4">Go back</a>
    <img src="/images/recipes/{{ $recipe->image }}" alt="" class="recipe-img mb-4">
    <h1>{{ $recipe->name }}</h1>
    <div class="stripe bg-black my-4"></div>
    <div class="recipe-content">
        {!! $recipe->content !!}
    </div>
@endsection