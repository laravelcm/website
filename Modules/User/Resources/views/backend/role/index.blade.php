@extends('layouts.master')
@section('title', __('user::labels.backend.access.roles.management'))

@section('breadcrumb-links')
    <a href="{{ route('admin.auth.role.create') }}" class="btn btn-sm btn-elevate btn-brand btn-elevate">
        <i class="flaticon2-add-1"></i>
        @lang('labels.general.create_new')
    </a>
@endsection

@section('content')

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <div class="kt-form kt-fork--label-right kt-margin-t-20 kt-margin-b-10">
                <div class="row align-items-center">
                    <div class="col-md-12 order-2 order-xl-1">
                        <div class="row align-items-center kt-margin-b-20-tablet-and-mobile">
                            <div class="col-md-4">
                                <div class="kt-input-icon kt-input-icon--left">
                                    <input type="text" class="form-control" placeholder="@lang('strings.backend.general.search_placeholder')" id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                        <span><i class="la la-search"></i></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8 text-right">
                                <!--begin: Selected Rows Group Action Form -->
                                <div class="kt-form kt-fork--label-align-right collapse" id="kt_datatable_group_action_form">
                                    <div class="row align-items-center">
                                        <div class="col-xl-12">
                                            <div class="kt-form__group kt-form__group--inline">
                                                <div class="kt-form__label kt-form__label-no-wrap">
                                                    <label class="kt--font-bold kt--font-danger-">@lang('strings.backend.general.selected')
                                                        <span id="kt_datatable_selected_number">0</span> @lang('strings.backend.general.records'):
                                                    </label>
                                                </div>
                                                <div class="kt-form__control">
                                                    <a
                                                        href="{{ route('admin.auth.role.delete') }}"
                                                        data-delete="delete"
                                                        data-trans-button-cancel="@lang('buttons.general.cancel')"
                                                        data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                                                        data-trans-title="@lang('strings.backend.general.are_you_sure')"
                                                        class="btn btn-sm btn-danger"
                                                        id="kt_datatable_delete_all">
                                                        @lang('buttons.general.delete_all')
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Selected Rows Group Action Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">
            <!--begin: Datatable -->
            <div class="kt_datatable" id="roles"></div>
            <!--end: Datatable -->
        </div>
    </div>

@endsection
