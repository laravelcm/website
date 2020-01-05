@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="kt-portlet setting">
                <a href="{{ route('admin.setting.env') }}" class="kt-portlet__body">
                    <span class="setting-icon env"><i class="flaticon2-dashboard"></i></span>
                    <span class="setting-title">Env Setup</span>
                    <span class="setting-description">This setting is to define or update the .env file for global variable</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="kt-portlet setting">
                <a href="#" class="kt-portlet__body">
                    <span class="setting-icon mail"><i class="flaticon2-send"></i></span>
                    <span class="setting-title">Mail Setting</span>
                    <span class="setting-description">Email configuration setting enable on .env file for global variable</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="kt-portlet setting">
                <a href="#" class="kt-portlet__body">
                    <span class="setting-icon translate"><i class="la la-language"></i></span>
                    <span class="setting-title">Translate</span>
                    <span class="setting-description">This setting is to define or update the .env file for global variable</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="kt-portlet setting">
                <a href="#" class="kt-portlet__body">
                    <span class="setting-icon module"><i class="flaticon2-cube"></i></span>
                    <span class="setting-title">Modules</span>
                    <span class="setting-description">This setting is to add or update the general setting for your website</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="kt-portlet setting">
                <a href="#" class="kt-portlet__body">
                    <span class="setting-icon theme"><i class="flaticon2-browser-1"></i></span>
                    <span class="setting-title">Themes</span>
                    <span class="setting-description">Email configuration setting enable on .env file for global variable</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="kt-portlet setting">
                <a href="#" class="kt-portlet__body">
                    <span class="setting-icon user"><i class="flaticon2-user-1"></i></span>
                    <span class="setting-title">User</span>
                    <span class="setting-description">This setting is to add or update the general setting for your website</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="kt-portlet setting">
                <a href="#" class="kt-portlet__body">
                    <span class="setting-icon log"><i class="flaticon2-warning"></i></span>
                    <span class="setting-title">Log</span>
                    <span class="setting-description">Email configuration setting enable on .env file for global variable</span>
                </a>
            </div>
        </div>
    </div>

@endsection
