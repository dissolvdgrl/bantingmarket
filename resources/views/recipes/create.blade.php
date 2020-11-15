@extends('layouts.dashboard')

@section('extra-head-content')
<link rel="stylesheet" type="text/css" href="css/trix.css">
<script type="text/javascript" src="js/trix.js"></script>
@endsection

@section('title', 'Create Recipe')

@section('content')
    @if (session('status'))
        <div class="alert bg-dg text-white text-2xl mb-4 w-1/3 shadow-xl p-4">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert bg-warning text-white text-2xl mb-4 w-1/3 shadow-xl p-4">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <a href="/home" class="link-back">Back to dashboard</a>
    <h1 class="mb-8">Creating a new recipe</h1>
    <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data" class="w-1/2">
        @csrf
        <div class="form-group flex flex-col mb-4">
            <input
                type="text"
                id="recipe_name"
                name="recipe_name"
                placeholder="Recipe name"
                class="border-b border-black mb-1 bg-transparent"
                @change="slugify()"
                required>
                <input type="hidden" value="" v-model="slug" id="slug">
            <label for="recipe_name" class="font-sansBold">
                Recipe name
                <span class="required text-warning">*</span>
            </label>
        </div> <!-- recipe name end -->

        <div class="form-group flex flex-col mb-4">
            <input
                type="file"
                id="image"
                name="image"
                class="border-b border-black mb-1 bg-transparent">
            <label for="image" class="font-sansBold">
                Image (will be resized to 500px )
            </label>
        </div> <!-- image end -->

        <div class="form-group flex flex-col mb-4">
            @trix(\App\Recipe::class, 'content')
        </div>

        <div class="form-group flex flex-col">
            <button type="submit" value="submit" class="button text-center cursor-pointer mt-4" id="submit-btn">
                Submit
            </button>
        </div>
    </form>
@endsection