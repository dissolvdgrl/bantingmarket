@extends('layouts.dashboard')

@section('title', 'Dashboard')

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
    <p class="font-sansBold">Editing:</p>
    <h1> {{ $recipe->name }}</h1>
    <div class="stripe bg-black mb-8"></div>
    <form method="POST" action="{{ route('recipes.update', $recipe->id) }}" enctype="multipart/form-data" class="w-1/2">
        @csrf
        @method('PATCH')
        <div class="form-group flex flex-col mb-4">
            <input
                type="text"
                id="recipe_name"
                name="recipe_name"
                placeholder="Recipe name"
                class="border-b border-black mb-1 bg-transparent"
                @change="slugify()"
                value="{{ $recipe->name }}"
                required>
                <input type="hidden" value="" v-model="slug" id="slug" name="slug">
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
                Image (will be resized to 348px by 200px )
            </label>
        </div> <!-- image end -->

        <div class="form-group flex flex-col mb-4">
            <input type="hidden" value="{{ $recipe->content }}" id="recipe-content">
            @trix($recipe, 'content')
        </div>

        <div class="form-group flex flex-col">
            <button type="submit" value="submit" class="button text-center cursor-pointer mt-4" id="submit-btn">
                Submit
            </button>
        </div>
    </form>

    <form action="{{ route('recipes.destroy', $recipe->slug) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submut" class="mt-4 text-center bg-warning p-2 text-white block">Delete</button>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">

        function setValue(text = '') {
            const trixEditor = document.querySelector("trix-editor");
            trixEditor.editor.insertHTML(text);
        }

        document.addEventListener("DOMContentLoaded", function (event) {
            setValue(document.getElementById('recipe-content').value);
            console.log('poof');
        });


    </script>
@endsection
