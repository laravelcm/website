@extends('layouts.app')
@section('title', __('Register'))

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
                <div class="row">
                    <div class="col col-md-6">
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf

                            <div class="form-group">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ __('Name') }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ __('Confirm Password') }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>

                                {{ __('Have an account') }} ?
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Click here to login') }}
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-1"></div>
                    <div class="col col-md-5">
                        <h5 class="social-title">{{ __('Register using social network') }}</h5>
                        <a href="javascript:;" class="btn btn-social btn-block btn-facebook">
                            <span class="fa fa-facebook"></span> {{ __('Register with Facebook') }}
                        </a>
                        <a href="javascript:;" class="btn btn-social btn-block btn-github">
                            <span class="fa fa-github"></span> {{ __('Register with Github') }}
                        </a>
                        <a href="javascript:;" class="btn btn-social btn-block btn-google">
                            <span class="fa fa-google"></span> {{ __('Register with Google') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
