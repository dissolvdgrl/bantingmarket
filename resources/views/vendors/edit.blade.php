@extends('layouts.dashboard')

@section('title', 'Edit Vendor')

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
    <a href="/vendors/browse" class="link-back">Back to dashboard</a>
    <h1 class="mb-8">Editing vendor</h1>
    <form method="POST" action="{{ route('vendors.update', $vendor->id)}}" enctype="multipart/form-data" class="w-1/2">
        @method('PATCH')
        @csrf
        <div class="form-group flex flex-col mb-4">
            <input
                type="text"
                id="vendor_name"
                name="vendor_name"
                value="{{ $vendor->name }}"
                placeholder="Stall/business name"
                class="border-b border-black mb-1 bg-transparent"
                required>
            <label for="stall_name" class="font-sansBold">
                Vendor/Business name
                <span class="required text-warning">*</span>
            </label>
        </div> <!-- stall name end -->
        <div class="form-group flex flex-col mb-4">
            <label for="logo" class="font-sansBold">
                Logo
            </label>
            <img src="/images/vendors/{{ $vendor->logo }}" class="w-1/3 mb-4"/>
            <input type="hidden" value="{{ $vendor->logo }}">
            <button class="button mb-4 w-1/3" @click.prevent="newLogo()">Upload a new logo...</button>
            <vendor-logo v-if="logo"></vendor-logo>
        </div> <!-- logo end -->
        <div class="form-group flex flex-col mb-4">
            <input
                type="email"
                id="email"
                name="email"
                value="{{ $vendor->email }}"
                placeholder="example@example.com"
                class="border-b border-black mb-1 bg-transparent"
                required>
            <label for="email" class="font-sansBold">
                Email
                <span class="required text-warning">*</span>
            </label>
        </div> <!-- email address end -->
        <div class="form-group flex flex-col mb-4">
            <input
                type="phone"
                id="phone"
                name="phone"
                value="{{ $vendor->phone }}"
                placeholder="012 345 6789"
                class="border-b border-black mb-1 bg-transparent"
                required>
            <label for="phone" class="font-sansBold">
                Phone
                <span class="required text-warning">*</span>
            </label>
        </div> <!-- phone end -->
        <div class="form-group flex flex-col mb-4">
            <input
                type="url"
                id="website"
                name="website"
                value="{{ $vendor->website }}"
                placeholder="https://example.com"
                class="border-b border-black mb-1 bg-transparent">
            <label for="website" class="font-sansBold">
                Website
            </label>
        </div> <!-- website end -->
        <div class="form-group flex flex-col mb-4">
            <input
                type="text"
                id="description"
                name="description"
                value="{{ $vendor->description }}"
                placeholder="Types of products sold"
                class="border-b border-black mb-1 bg-transparent">
            <label for="description" class="font-sansBold">
                Description
            </label>
        </div> <!-- description end -->
        <div class="form-group flex flex-col mb-4">
            <p class="font-sansBold">Status:</p>
            <input
                type="checkbox"
                id="switch"
                {{ $vendor->status == 'active' ? 'checked' : '' }}
                name="status"/>
            <label for="switch" id="switch_label">Status</label>
        </div> <!-- status end -->
        <div class="form-group flex flex-col">
            <button type="submit" value="submit" class="button text-center cursor-pointer mt-4" id="submit-btn">
                Submit
            </button>
        </div>
    </form>
@endsection