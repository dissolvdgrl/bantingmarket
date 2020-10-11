@extends('layouts.app')

@section('title', 'Apply')

@section('header')
<p class="header-small justify-self-start">Sell your goods</p>
<h1 class="justify-self-start">How do I <span class="font-bold">sell my products at the market?</span></h1>
<div class="bg-black sub-heading p-4 justify-self-start">
    <a href="/apply" class="text-white font-sansBold">We're serious about real food</a>
    <img src="{{ asset('/images/flowers_2.svg') }}" alt="decorative flowers illustration">
</div>
@endsection

@section('content')
    <p class="font-serif text-2xl italic mt-8">To start your application to sell products at the market,        please check out the requirements below.</p>
    <p class="text-3xl my-8">Please read carefully, we will disqualfy any application without notice which does not adhere to our guidelines.</p>
    <p class="my-8">Once you've gone through them all, you will have access to the form.</p>

    <div class="vendor-form-container card p-8">
        <h1 class="uppercase text-2xl font-bold">Market Guidelines</h1>
        <ul class="list-disc pl-4 mt-8">
            <li>All products must be listed on the application form. Include the ingredients you use to produce your products.</li>
            <li>You may be asked to provide us with samples of your products for approval.</li>
            <li>ONLY banting/keto/low-carb products will be approved, i.e.: sugar free, low carb, healthy fat</li>
            <li>No vegetable oil, no artificial preservatives, no wheat, etc.</li>
            <li>Stallholders are encouraged to specialise in a certain product and not have a table packed with a variety of different types of products. It can be confusing to a customer and might affect your sales.</li>
            <li>All products MUST display ingredients, and if possible the carb content.</li>
        </ul>

        <p class="text-warning font-sansBold text-xl">DO NOT APPLY IF YOU SELL:</p>
        <ul class="list-disc pl-4 mt-8">
            <li>Weight loss products</li>
            <li>Herbalife</li>
            <li>Aloe Ferox with longs lists of ingredients</li>
            <li>Products higher than 30g carbs per 100g</li>
            <li>Fruit juice</li>
            <li>Dried fruit</li>
            <li>If you aren't familiar with the LCHF lifestyle.</li>
            <li>Products with long lists of foreign ingredients</li>
            <li>Skin and body products containing paraffin or unnatural ingredients</li>
            <li>Meal replacement shakes</li>
            <li>Anything that is NOT food-related. We do not sell art and crafts, jewellery, clothes, toys, etc.</li>
        </ul>

        <div class="form-group">
            <label class="large-checkbox">
                <input type="checkbox" name="understand" v-model="understand" />
                <span class="text-2xl">I understand</span>
              </label>
        </div>

        <div class="application-form" v-if="this.understand == true">
            <application-terms/>
        </div>
        <application-form  />{{--  v-if="this.terms == true" --}}

    </div>
@endsection