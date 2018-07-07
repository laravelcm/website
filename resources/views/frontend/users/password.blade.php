@extends('layouts.app')
@section('title', __('Update password'))

@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('My account') }}</h1>
            </div>
            <div class="header__link">
                <a href="{{ route('logout') }}" class="btn btn-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <section class="account">
        <div class="container">
            @include('frontend.partials.success')
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    @include('frontend.users.sidebar')
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="card forum_account">
                        <h2>{{ __('Update password') }}</h2>
                        <form action="{{ route('users.update-password', auth()->user()) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="password">{{ __('Password') }} <span class="text-danger">*</span></label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Update my password') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
