<div class="card">
    <img src="{{ asset('/images/vendors/'. $logo) }}" alt="{{ $name }} logo">
    <h2 class="font-sansBold text-xl">{{ $name }}</h2>
    <p>{{ $description }}</p>
    @if ($website)
        <a href="{{ $website }}" class="link mt-8" target="_blank">Visit website</a>
    @endif
</div>