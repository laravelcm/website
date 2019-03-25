@extends('core::public.master')
@section('title', __('Reset Password'))

@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('Reset Password') }}</h1>
            </div>
            <div class="header__link">
                <a href="{{ route('login') }}" class="btn btn-white">{{ __('Log in') }}</a>
            </div>
        </div>
    </header>

    <section class="login">
        <div class="container">
            <div class="card">
                <h2 class="card__title">{{ __('Reset Password') }}</h2>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        @include('users::_status')

                        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send password reset link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
