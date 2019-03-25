@extends('core::public.master')
@section('title', __('My Account'))

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
            @include('users::_success')
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    @include('users::_sidebar')
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="card forum_account">
                        <h2>{{ __('Profile') }}</h2>
                        <form action="{{ route('users.update-account', auth()->user()) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="account__grid-off">
                                <div class="account_info">
                                    <div class="form-group">
                                        <label for="name">{{ __('First name') }} <small class="text-danger">*</small></label>

                                        <input id="name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ auth()->user()->first_name }}" required>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ __('Last name') }} <small class="text-danger">*</small></label>

                                        <input id="name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ auth()->user()->last_name }}" required>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail') }} <small class="text-danger">*</small></label>

                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ auth()->user()->email }}" readonly>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    {{--<div class="form-group">
                                        <label for="twitter_profile">{{ __('Your Twitter') }}</label>
                                        <input id="twitter_profile" type="text" class="form-control" name="twitter_profile" value="{{ auth()->user()->twitter_profile }}" placeholder="@laravelcm">
                                    </div>

                                    <div class="form-group">
                                        <label for="github_profile">{{ __('Your Github Username') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">https://github.com/</span>
                                            </div>
                                            <input id="github_profile" type="text" class="form-control" name="github_profile" value="{{ auth()->user()->github_profile }}">
                                        </div>
                                    </div>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
