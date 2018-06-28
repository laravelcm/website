@extends('layouts.app')
@section('title', __('Login'))

@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('Login') }}</h1>
            </div>
            <div class="header__link">
                <a href="{{ route('register') }}" class="btn btn-white">{{ __('Register') }}</a>
            </div>
        </div>
    </header>

    <section class="login">
        <div class="container">
            <div class="card">
                <h2 class="card__title">{{ __('Login to your account') }}</h2>
                <div class="row">
                    <div class="col col-md-6">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-Mail Address') }}">

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
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="label-text">{{ __('Remember Me') }}</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>

                                <a class="btn btn-link first" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> |
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Register a new account') }}
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-1"></div>
                    <div class="col col-md-5">
                        <h5 class="social-title">{{ __('Login using social network') }}</h5>
                        <a href="javascript:;" class="btn btn-social btn-block btn-facebook">
                            <span class="fa fa-facebook"></span> {{ __('Login with Facebook') }}
                        </a>
                        <a href="javascript:;" class="btn btn-social btn-block btn-github">
                            <span class="fa fa-github"></span> {{ __('Login with Github') }}
                        </a>
                        <a href="javascript:;" class="btn btn-social btn-block btn-google">
                            <span class="fa fa-google"></span> {{ __('Login with Google') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
