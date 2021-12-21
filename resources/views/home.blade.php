@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col items-start">
    <div class="card p-4">
        <h2 class="font-serif uppercase font-bold text-xl">Vendors</h2>
        <div class="stripe bg-black mb-8"></div>
        <p>There are currently <span class="font-sansBold">{{ count($vendors) }}</span> vendors in our database.</p>
        <p><span class="font-sansBold">{{ count($active_vendors) }}</span> are active.</p>
        <a href="/vendors/browse" class="link mt-8">View all</a>
    </div>
    <div class="card p-4">
        <h2 class="font-serif uppercase font-bold text-xl">Recipes</h2>
        <div class="stripe bg-black mb-8"></div>
        <p>There are currently <span class="font-sansBold">{{ count($recipes) }}</span> recipes listed.</p>
        <a href="/recipes/browse" class="link mt-8">View all</a>
    </div>
</div>
@endsection
