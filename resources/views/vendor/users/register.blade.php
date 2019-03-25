@extends('core::public.master')
@section('title', __('Register'))

@push('css')
    <link href="{{ url('/vendor/mckenziearts/laravel-oauth/assets/css/socialite.css') }}" rel="stylesheet">
@endpush

@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('Register') }}</h1>
            </div>
            <div class="header__link">
                <a href="{{ route('login') }}" class="btn btn-white">{{ __('Login') }}</a>
            </div>
        </div>
    </header>

    <section class="login">
        <div class="container">
            <div class="card">
                <h2 class="card__title">{{ __('Register a new account') }}</h2>
                @include('users::_status')
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf

                            <div class="form-group">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" required autofocus placeholder="{{ __('First name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" required placeholder="{{ __('Last name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail') }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Password') }}">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ __('Password confirmation') }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                                {{ __('Have an account') }} ?<a class="btn-link" href="{{ route('login') }}">{{ __('Click here to login') }}</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-1 col-md-1"></div>
                    <div class="col-sm-12 col-md-5">
                        <h5 class="socialite-title">{{ __('Register using social network') }}</h5>
                        @socialite('register')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
