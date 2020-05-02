@extends('backend.layouts.auth')
@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')

    <div class="row justify-content-md-center align-items-center h-100">
        <div class="card-wrapper">
            <div class="brand">
                @include('backend.includes.partials.logo')
            </div>
            @if($errors->any())
                <div class="alert alert-danger mg-b-20" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    @foreach($errors->all() as $error)
                        {!! $error !!}<br/>
                    @endforeach
                </div>
            @endif
            <div class="card fat">
                <div class="card-body">
                    <h4 class="card-title">@lang('labels.frontend.auth.login_box_title')</h4>
                    <form method="POST" class="my-login-validation" novalidate action="{{ route('frontend.auth.login.post') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('validation.attributes.frontend.email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            <div class="invalid-feedback">{{ __('Email is invalid') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('validation.attributes.frontend.password') }}
                                <a href="{{ route('frontend.auth.password.reset') }}" class="float-right">@lang('labels.frontend.passwords.forgot_password')</a>
                            </label>
                            <input id="password" type="password" class="form-control" name="password" required data-eye>
                            <div class="invalid-feedback">{{ __('Password is required') }}</div>
                        </div>

                        <div class="form-group">
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                <label for="remember" class="custom-control-label">{{ __('labels.frontend.auth.remember_me') }}</label>
                            </div>
                        </div>

                        <div class="form-group m-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('labels.frontend.auth.login_button') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @include('backend.includes.partials.auth-footer')
        </div>
    </div>

@endsection
