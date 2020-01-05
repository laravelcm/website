@extends('layouts.master')
@section('title', __('user::labels.backend.access.users.management') . ' | ' . __('user::menus.backend.access.users.profile'))

@section('content')

    <!--Begin::App-->
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

        <!--Begin:: App Aside Mobile Toggle-->
        <button class="kt-app__aside-close" id="kt_profile_aside_close">
            <i class="la la-close"></i>
        </button>
        <!--End:: App Aside Mobile Toggle-->

        <!--Begin:: App Aside-->
        <div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--sm kt-app__aside--fit" id="kt_profile_aside">

            <!--Begin:: Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--general-1">
                        <div class="kt-media kt-media--brand kt-media--md kt-media--circle">
                            <img src="{{ $logged_in_user->picture }}" alt="{{ $logged_in_user->email }}">
                        </div>
                        <div class="kt-widget__wrapper">
                            <div class="kt-widget__label">
                                <h6 class="kt-widget__title">{{ $logged_in_user->full_name }}</h6>
                                <span class="kt-widget__desc">{{ $logged_in_user->roles_label }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__separator"></div>
                <div class="kt-portlet__body">
                    <ul class="kt-nav kt-nav--bolder kt-nav--fit-ver kt-nav--v4" role="tablist">
                        <li class="kt-nav__item {{ active_class(Active::checkUriPattern('admin/user/profile/profile')) }}">
                            <a class="kt-nav__link active" href="{{ route('admin.auth.profile.index', 'profile') }}" role="tab">
                                <span class="kt-nav__link-icon"><i class="flaticon2-user"></i></span>
                                <span class="kt-nav__link-text">@lang('user::menus.backend.access.profile.personal')</span>
                            </a>
                        </li>
                        <li class="kt-nav__item  {{ active_class(Active::checkUriPattern('admin/user/profile/account-settings')) }}">
                            <a class="kt-nav__link" href="{{ route('admin.auth.profile.index', 'account-settings') }}" role="tab">
                                <span class="kt-nav__link-icon"><i class="flaticon-feed"></i></span>
                                <span class="kt-nav__link-text">@lang('user::menus.backend.access.profile.settings')</span>
                            </a>
                        </li>
                        <li class="kt-nav__item  {{ active_class(Active::checkUriPattern('admin/user/profile/change-password')) }}">
                            <a class="kt-nav__link" href="{{ route('admin.auth.profile.index', 'change-password') }}" role="tab">
                                <span class="kt-nav__link-icon"><i class="flaticon2-settings"></i></span>
                                <span class="kt-nav__link-text">@lang('user::menus.backend.access.profile.password')</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                            <a class="kt-nav__link" href="javascript:;" role="tab" data-toggle="kt-tooltip" data-placement="right" title="This feature is coming soon!">
                                <span class="kt-nav__link-icon"><i class="flaticon2-chart2"></i></span>
                                <span class="kt-nav__link-text">@lang('user::menus.backend.access.profile.user_setting')</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--End:: Portlet-->
        </div>

        <!--End:: App Aside-->

        <!--Begin:: App Content-->
        @include('user::backend.user.profile.' . $section)
        <!--End:: App Content-->
    </div>

    <!--End::App-->

@endsection
