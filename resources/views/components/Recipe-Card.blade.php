<div class="card">
    <img src="{{ asset('/images/recipes/'. $image) }}" alt="{{ $name }} logo">
    <div class="p-4">
        <h2 class="font-sansBold text-xl">{{ $name }}</h2>
        <a href="/recipes/{{ $slug }}" class="link mt-8">Let's cook</a>
    </div>
</div>