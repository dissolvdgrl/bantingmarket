@extends('layouts.app')

@section('title', 'Contact')

@section('header')
    <p class="header-small justify-self-start">Talk to us</p>
    <h1 class="justify-self-start">It's okay to<span class="font-bold"> have questions :)</span></h1>
    <div class="bg-black sub-heading p-4 justify-self-start">
        <p class="text-white">Ask us anything</p>
        <img src="{{ asset('/images/flowers_2.svg') }}" alt="decorative flowers illustration">
    </div>
@endsection

@section('content')
    <p class="font-serif text-2xl italic mt-8">We'd love to hear your thoughts, drop us a message and  we'll get back to you as soon as possible! </p>
    <p class="my-8">If you're looking for the next market date, please check the top of the website. If you're looking for directions, please follow this link.</p>

    <div class="form-container">
        <form action="/contact" method="POST" class="card p-4">
            @csrf
            @honeypot
            <h1 class="uppercase">Contact form</h1>
            <div class="form-group flex flex-col mt-4">
                <input type="text" name="firstname" class="border-b border-black mb-1" placeholder="Jane Smith" required>
                <label for="firstname" class="font-sansBold">Name <span class="required text-warning">*</span> </label>
            </div>
            <div class="form-group flex flex-col mt-4">
                <input type="email" name="email_address" class="border-b border-black mb-1" placeholder="jane@example.com" required>
                <label for="email_address" class="font-sansBold">Email address <span class="required text-warning">*</span> </label>
            </div>
            <div class="form-group flex flex-col mt-4">
                <input type="text" name="msg_subject" class="border-b border-black mb-1" placeholder="Question about parking" required>
                <label for="msg_subject" class="font-sansBold">Subject <span class="required text-warning">*</span> </label>
            </div>
            <div class="form-group flex flex-col mt-4">
                <textarea type="textarea" name="msg_body" class="border-b border-black mb-1" placeholder="Please type your message here..." minlength="24" required></textarea>
                <label for="msg_body" class="font-sansBold">Message <span class="required text-warning">*</span> </label>
            </div>

            <div class="form-group flex flex-col mt-4">
                <div class="h-captcha" data-sitekey="{{ env('H_CAPTCHA_KEY')}}"></div>
            </div>

            <div class="form-group flex flex-col mt-8 items-start">
                <button type="submit" class="submit-btn p-2">Submit</button>
            </div>
        </form>

        <div class="contact-details">
            <p class="font-serif font-bold leading-none">079 527 4902</p>
            <p class="text-dg text-sm">Phone</p>
            <p class="font-serif font-bold leading-none mt-8"><email></email></p>
            <p class="text-dg text-sm">Email</p>
            <div class="social-media mt-8">
                <a href="https://www.facebook.com/bantingmarketpretoria123/" target="_blank">
                    <img src="{{ asset('images/facebook_icon_black.svg') }}" alt="">
                </a>
                <a href="https://www.instagram.com/bantingmarketpretoria/" target="_blank">
                    <img src="{{ asset('images/instagram_icon_black.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
@endsection