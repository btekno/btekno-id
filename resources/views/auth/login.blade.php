@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div uk-height-viewport class="uk-flex uk-flex-middle uk-grid-collapse uk-grid-match" uk-grid>
        <div class="form-media uk-width-2-3@m uk-width-1-2@s uk-visible@s uk-height-viewport uk-background-cover" data-src="{{ asset('assets/v1/img/bg-login.jpg') }}" uk-img>        

            <div class="form-media-content uk-light"> 
                <h1>It's not about coffee or food, <br/>it's about togetherness.</h1>
                <div class="form-media-footer">
                    {{-- @include('my::auth.layouts.partials.footer') --}}
                </div>
            </div>
        </div>
        <div class="uk-width-1-3@m uk-width-1-2@s uk-animation-slide-right-medium">

            <div class="px-5">
                
                <div class="my-0 uk-text-left">
                    <h4 class="uk-text-uppercase uk-text-small mb-0"><strong>Log Into</strong></h4>
                    <img src="{!! config('my.assets.logo') !!}" class="mr-2 mb-1 mt-2" alt="Logo" width="150">
                </div>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <p class="uk-text-muted mb-3">
                    Use your social media accounts to access all the features.
                </p>

                @if(config('my.plugin.facebook.enable') || config('my.plugin.twitter.enable') || config('my.plugin.google.enable'))
                <div class="mb-3">
                    @if(config('my.plugin.facebook.enable'))
                        <a href="{{ route('my.social', 'facebook') }}{{ request()->has('redirect') ? '?redirect='.request('redirect') : '' }}" class="button primary icon-label bg-facebook">
                            <span class="inner-icon"><i class="icon-brand-facebook-f"></i></span>
                            <span class="inner-text hide-mobile"> &nbsp;Facebook</span>
                        </a>
                    @endif

                    @if(config('my.plugin.google.enable'))
                        <a href="{{ route('my.social', 'google') }}{{ request()->has('redirect') ? '?redirect='.request('redirect') : '' }}" class="button primary icon-label bg-google">
                            <span class="inner-icon"><i class="icon-brand-google"></i></span>
                            <span class="inner-text hide-mobile"> &nbsp;Google</span>
                        </a>
                    @endif

                    @if(config('my.plugin.twitter.enable'))
                        <a href="{{ route('my.social', 'twitter') }}{{ request()->has('redirect') ? '?redirect='.request('redirect') : '' }}" class="button primary icon-label bg-twitter">
                            <span class="inner-icon"><i class="icon-brand-twitter"></i></span>
                            <span class="inner-text hide-mobile"> &nbsp;Twitter</span>
                        </a>
                    @endif
                </div>
                @endif

                <p class="uk-text-muted mb-3">
                    Or simply enter your email and password
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-2">
                        <div class="uk-inline">
                            <span class="uk-form-icon icon-feather-user"></span>
                            <input id="email" type="text" class="uk-input bg-secondary uk-form-width-large @error('email') uk-form-danger @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('E-Mail or Username') }}">
                        </div>
                        @error('email')
                            <p class="uk-text-left uk-text-small uk-text-danger mt-1 ml-2">{{ $message }}</p>  
                        @enderror
                    </div>

                    <div class="mb-2">
                        <div class="uk-inline">
                            <span class="uk-form-icon icon-feather-lock"></span>
                            <input id="password" type="password" class="uk-input bg-secondary uk-form-width-large @error('password') uk-form-danger @enderror" name="password" value="{{ old('password') }}" autocomplete="current-password" placeholder="{{ __('Password') }}">
                        </div>
                        @error('password')
                            <p class="uk-text-left uk-text-small uk-text-danger mt-1 ml-2">{{ $message }}</p>  
                        @enderror
                    </div>

                    @if(config('my.plugin.recaptcha.enable'))
                        <div class="uk-form-group mt-3 mb-3">
                            <script src="https://www.google.com/recaptcha/api.js"></script>
                            <div class="g-recaptcha" data-sitekey="{{ config('my.plugin.recaptcha.key') }}"></div>
                            @error('g-recaptcha-response')
                                <small class="text-danger ml-2">
                                    <small>{{ $message }}</small>
                                </small>
                            @enderror
                        </div>
                    @endif

                    <div class="uk-grid-small uk-child-width-auto uk-grid my-3">
                        <label for="remember">
                            <input class="uk-checkbox mr-1" id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Remember Me') }}
                        </label>
                        @if(config('my.enable.verify_email'))
                            <a href="{{ route('password.request') }}" class="uk-flex-1 uk-text-right">
                                Forgot Password ?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="button large block primary mb-3">{{ __('Sign In') }}</button> 

                    @if(config('my.enable.registration'))
                        <p class="uk-text-muted">
                            Don't have an account? <a href="{{ route('register') }}{{ request()->has('affiliate') ? '?affiliate='.request('affiliate') : '' }}" class="uk-text-bold">Sign Up</a>
                        </p>
                    @endif

                    @if(request()->has('redirect'))
                        <input type="hidden" name="redirect" value="{{ request()->redirect }}">
                    @endif

                </form>
            </div>

        </div>
    </div>
@endsection
