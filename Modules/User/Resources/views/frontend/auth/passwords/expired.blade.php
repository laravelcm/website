@extends('backend.layouts.auth')
@section('title', app_name() . ' | ' . __('labels.frontend.passwords.expired_password_box_title'))

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
                    <h4 class="card-title">@lang('labels.frontend.passwords.expired_password_box_title')</h4>
                    {{ html()->form('PATCH', route('frontend.auth.password.expired.update'))->class('form-horizontal')->open() }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.old_password'))->for('old_password') }}
                                    {{ html()->password('old_password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.old_password'))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}
                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}
                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block" id="btn-login">
                                        {{ __('labels.frontend.passwords.update_password_button') }}
                                    </button>
                                </div>
                            </div><!--col-->
                        </div><!--row-->

                    {{ html()->form()->close() }}
                </div>
            </div>
            @include('backend.includes.partials.auth-footer')
        </div>
    </div>

@endsection
