@extends('core::public.master')
@section('title', __('New password'))


@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('New password') }}</h1>
            </div>
            <div class="header__link">
                <a href="{{ route('login') }}" class="btn btn-white">{{ __('Login') }}</a>
            </div>
        </div>
    </header>

    <section class="login">
        <div class="container">
            <div class="card">
                <h2 class="card__title">{{ __('New password') }}</h2>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @include('users::_status')
                        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email">{{ __('EMail') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Password confirmation') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
