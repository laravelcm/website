@extends('backend.layouts.auth')
@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

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
            @if(session('status'))
                <div class="alert alert-success m-b-none alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card fat">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Forgot Password') }}</h4>
                    {{ html()->form('POST', route('frontend.auth.password.email.post'))
                            ->attribute('novalidate', true)
                            ->addClass('my-login-validation')
                            ->open() }}
                        @csrf
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder('john.doe@larave-boilerplate.com')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                            <div class="invalid-feedback">{{ __('Email is invalid') }}</div>
                            <div class="form-text text-muted">
                                {{ __('By clicking "Reset Password" we will send a password reset link') }}
                            </div>
                        </div><!--form-group-->

                        <div class="form-group m-0">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('labels.frontend.passwords.send_password_reset_link_button') }}</button>
                        </div>
                        <div class="mt-4 text-center">
                            {{ __('Go back to') }} <a href="{{ route('frontend.auth.login') }}">{{ __('Login page') }}</a>
                        </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
            @include('backend.includes.partials.auth-footer')
        </div>
    </div>

@endsection
