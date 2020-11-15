@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="grid justify-items-center">
        <div class="card self-center w-1/3 p-2">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group flex flex-col mt-4">
                    <label for="email" class="">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="border-b border-black mb-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group flex flex-col mt-4">
                    <label for="password" class="">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group flex flex-col mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group flex flex-col mt-4">
                    <div class="h-captcha" data-sitekey="{{ env('H_CAPTCHA_KEY')}}"></div>
                </div>

                <div class="form-group flex flex-col mt-4">
                        <button type="submit" class="button">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
@endsection
