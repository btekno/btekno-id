@php($fullscreen = true)
@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Login')
@section('description', 'Discussion and hangout while doing a lot of things')
@section('url', url()->current())

{{-- Content --}}
@section('content')
    <div class="uk-flex uk-flex-middle uk-grid-collapse uk-grid-match" uk-grid>
        <div class="form-media uk-width-2-3@m uk-width-1-2@s uk-visible\@s uk-height-viewport uk-background-cover" data-src="{{ asset('assets/images/bg/bg-login.jpg') }}" uk-img>        

            <div class="form-media-content uk-light"> 
                <h1>It's not about coffee or food, <br/>it's about togetherness.</h1>
                <div class="form-media-footer">
                    
                </div>
            </div>
        </div>
        <div class="uk-width-1-3@m uk-width-1-2@s">

            <div class="px-4 overflow-auto h-100">
                
                <div class="my-0 ">
                    <h4 class="text-uppercase small mb-0 mb-0"><strong>Log Into</strong></h4>
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

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-2">
                        <input id="username" type="text" class="form-control bg-secondary {{ session('error') ? 'is-invalid' : '' }} @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="{{ __('E-Mail or Username') }}">
                        @error('username')
                            <div class="ms-1 small invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if(session()->has('error'))
                            <span class="invalid-feedback ms-2" role="alert">
                                <small>{!! session('error') !!}</small>
                            </span>
                        @endif
                    </div>

                    <div class="form-group mb-2">
                        <input id="password" type="password" class="form-control bg-secondary @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="current-password" placeholder="{{ __('Password') }}">
                        @error('password')
                            <small class="ms-1 text-danger">{{ $message }}</small>
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

                    <div class="d-flex justify-content-between my-1">
                        <div class="form-check">
                            <input class="form-check-input" id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Password ?') }}
                        </a>
                    </div>

                    <div class="btn-group btn-group-lg d-flex mb-3" role="group" aria-label="Login Button">
                        <button type="submit" class="btn btn-primary text-white btn-block" name="submit" value="login">
                            <small>
                                <x-heroicon-o-lock-closed />
                                {{ __('Sign In') }}
                            </small>
                        </button>
                        <button type="submit" class="btn btn-dark btn-block" name="submit" value="magic-link">
                            <small>
                                <x-heroicon-o-mail />
                                {{ __('Magic Link') }}
                            </small>
                        </button>
                    </div>

                    <p class="text-muted">
                        Don't have an account? <a href="{{ route('register') }}" class="fw-bold">Sign Up</a>
                    </p>

                    @if(request()->has('redirect'))
                        <input type="hidden" name="redirect" value="{{ request()->redirect }}">
                    @endif

                </form>
            </div>

        </div>
    </div>
@endsection
