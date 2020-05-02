@extends('layouts.master')
@section('title', __('strings.backend.dashboard.title'))

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="dashboard-intro kt-mt-50 d-flex">
                <div class="dashboard-logo mr-4">
                    <img src="{{ asset('img/backend/brand/logomark.min.svg') }}" alt="logo iug" width="130">
                </div>
                <div class="dashboard-message">
                    <h4 class="kt-label-font-color-4">@lang('dashboard::string.backend.dashboard.intro') @lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</h4>
                    <p class="kt-label-font-color-4">@lang('dashboard::string.backend.dashboard.intro_text') {{ app_name() }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
