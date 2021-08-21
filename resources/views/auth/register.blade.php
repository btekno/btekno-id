@php($fullscreen = true)
@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Register')
@section('description', 'Discussion and hangout while doing a lot of things')
@section('url', url()->current())

{{-- Content --}}
@section('content')
    <div uk-height-viewport class="uk-flex uk-flex-middle uk-grid-collapse uk-grid-match" uk-grid>
        <div class="form-media uk-width-2-3@m uk-width-1-2@s uk-visible@s uk-height-viewport uk-background-cover" data-src="{{ asset('assets/images/bg/bg-register.jpg') }}" uk-img>        

            <div class="form-media-content uk-light"> 
                <h1>Share great spots with people you care about, <br/>together we discover a new places.</h1>
                <div class="form-media-footer">
                    {{-- @include('my::auth.layouts.partials.footer') --}}
                </div>
            </div>
        </div>
        <div class="uk-width-1-3@m uk-width-1-2@s uk-animation-slide-right-medium">
            
            <div class="px-4 overflow-auto h-100">

                <div class="my-0 ">
                    <h4 class="text-uppercase small mb-0 mb-0"><strong>Register New Account</strong></h4>
                    <img src="{!! asset('assets/images/logo.png') !!}" class="mr-2 mb-1 mt-2" alt="Logo" width="175">
                </div>

                <p class="fw-normal text-muted mb-2">
                    Use your social media accounts to access all the features.
                </p>

                <div class="mb-2">
                    <a href="{{ route('social', 'facebook') }}{{ request()->has('redirect') ? '?redirect='.request('redirect') : '' }}" class="button primary icon-label me-1 bg-facebook">
                        <span class="inner-icon"><i class="icon-brand-facebook-f"></i></span>
                        <span class="inner-text d-none d-sm-inline-block small"> &nbsp;Facebook</span>
                    </a>

                    <a href="{{ route('social', 'google') }}{{ request()->has('redirect') ? '?redirect='.request('redirect') : '' }}" class="button primary icon-label me-1 bg-google">
                        <span class="inner-icon"><i class="icon-brand-google"></i></span>
                        <span class="inner-text d-none d-sm-inline-block small"> &nbsp;Google</span>
                    </a>

                    <a href="{{ route('social', 'twitter') }}{{ request()->has('redirect') ? '?redirect='.request('redirect') : '' }}" class="button primary icon-label me-1 bg-twitter">
                        <span class="inner-icon"><i class="icon-brand-twitter"></i></span>
                        <span class="inner-text d-none d-sm-inline-block small"> &nbsp;Twitter</span>
                    </a>
                </div>

                <p class="fw-normal text-muted mb-3">
                    Or simply enter your email and password
                </p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group mb-2">
                        <input id="name" type="text" class="form-control bg-secondary @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="{{ __('Full Name') }}">
                        @error('username')
                            <div class="ms-1 small invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2 uk-child-width-expand@s uk-grid-small" uk-grid>
                        <div class="form-group">
                            <input id="username" type="text" class="form-control bg-secondary @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" placeholder="{{ __('Username') }}">
                            @error('username')
                                <p class="ms-1 small invalid-feedback">{{ $message }}</p>  
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="text" class="form-control bg-secondary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                            @error('email')
                                <p class="ms-1 small invalid-feedback">{{ $message }}</p>  
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control bg-secondary @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="password" placeholder="{{ __('Password') }}">
                        @error('password')
                            <p class="ms-1 small invalid-feedback">{{ $message }}</p>  
                        @enderror
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                        <div class="g-recaptcha" data-sitekey="{{ config('btekno.plugins.recaptcha.key') }}"></div>
                        @error('g-recaptcha-response')
                            <small class="text-danger ms-2">
                                <small>{{ $message }}</small>
                            </small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary btn-lg text-white btn-block">
                            <small>{{ __('Register') }}</small>
                        </button>
                    </div>

                    <p class="text-muted">
                        Already Registered ? <a href="{{ route('login') }}" class="fw-bold">Sign In</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
@endsection
