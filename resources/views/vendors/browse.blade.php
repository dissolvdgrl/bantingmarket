@extends('layouts.dashboard')

@section('title', 'Vendors')

@section('header')
    <p class="header-small justify-self-start">Viewing all</p>
    <h1 class="justify-self-start font-bold">Vendors</h1>
@endsection

@section('content')
    <p>We current have <span class="font-sansBold"> {{ count($vendors) }}</span> vendors in our database.</p>
    <a href="/vendors/create" class="button my-4 w-1/5 text-center">Create a new vendor</a>
    <div class="dash-vendors-container grid grid-cols-4 gap-8 mt-8">
        @foreach ($vendors as $vendor)
            <div class="card p-2 flex flex-col">
                <img src="{{ asset('/images/vendors/'. $vendor->logo) }}" alt="{{ $vendor->name }} logo">
                <p class="font-sansBold mt-4">{{ $vendor->name }}</p>
                <p>{{ $vendor->description }}</p>
                <div class="mt-auto">
                    <div>
                        <p class="mt-4 text-xs">Status:</p>
                        <p class="font-sansBold @if($vendor->status == 'active') text-dg @elseif($vendor->status == 'inactive') text-warning @endif">{{ ucfirst($vendor->status) }}</p>
                    </div>
                    <a href="/vendors/{{ $vendor->id }}/edit/" class="button mt-4 text-center">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection