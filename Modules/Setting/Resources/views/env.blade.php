@extends('layouts.master')
@section('title', __('setting::menus.backend.env_title') . ' - ' . __('setting::menus.backend.title'))

@section('content')

    <div class="row">
        <div class="col-md-8">
            {{ html()->form('POST', route('admin.setting.env.store'))->class('kt-form kt-form--label-right')->open() }}
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#env_site" role="tab">Site</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#env_locale" role="tab">Locale</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#env_social" role="tab">Social Providers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#env_captcha" role="tab">Captcha</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="env_site" role="tabpanel">
                                @include('setting::env.site')
                            </div>
                            <div class="tab-pane" id="env_locale" role="tabpanel">
                                @include('setting::env.locale')
                            </div>
                            <div class="tab-pane" id="env_social" role="tabpanel">
                                @include('setting::env.social')
                            </div>
                            <div class="tab-pane" id="env_captcha" role="tabpanel">
                                @include('setting::env.captcha')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet">
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-primary">@lang('setting::labels.backend.buttons.save_env')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{ html()->form()->close() }}
        </div>
        <div class="col-md-4">
            <div class="alert alert-light alert-elevate fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                <div class="alert-text">
                    @lang('setting::string.backend.env.reload')
                </div>
            </div>
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="d-flex">
                        <form action="{{ route('admin.setting.env.reload') }}" method="POST" class="kt-mr-10">
                            @csrf
                            <input name="action" type="hidden" value="cache">
                            <button class="btn btn-info" type="submit">{{ __('Clear cache') }}</button>
                        </form>
                        <form action="{{ route('admin.setting.env.reload') }}" method="POST" class="kt-mr-10">
                            @csrf
                            <input name="action" type="hidden" value="config">
                            <button class="btn btn-info" type="submit">{{ __('Save config') }}</button>
                        </form>
                        <form action="{{ route('admin.setting.env.reload') }}" method="POST" class="kt-mr-10">
                            @csrf
                            <input name="action" type="hidden" value="route">
                            <button class="btn btn-info" type="submit">{{ __('Save routes') }}</button>
                        </form>
                        <form action="{{ route('admin.setting.env.reload') }}" method="POST" class="kt-mr-10">
                            @csrf
                            <input name="action" type="hidden" value="view">
                            <button class="btn btn-info" type="submit">{{ __('Clear views') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    {!! script(themes('dist/js/pages/components/forms/widgets/bootstrap-select.js')) !!}
    <script>
        $('.kt_maxlength').maxlength({
            threshold: 3,
            warningClass: "kt-badge kt-badge--danger kt-badge--rounded kt-badge--inline",
            limitReachedClass: "kt-badge kt-badge--success kt-badge--rounded kt-badge--inline",
            separator: ' {{ __('of') }} ',
            preText: '{{ __('You have') }} ',
            postText: ' {{ __('chars remaining.') }}',
            validate: true
        });
    </script>
@endpush
