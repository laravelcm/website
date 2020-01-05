@extends('layouts.master')
@section('title', __('user::labels.backend.access.users.management'))

@section('breadcrumb-links')
    <div class="kt-subheader__toolbar">
        <a href="{{ route('admin.auth.user.create') }}" class="btn btn-brand btn-bold">@lang('user::menus.backend.access.users.create')</a>
        @include('user::backend.user.includes.breadcrumb-links')
    </div>
@endsection

@section('content')

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <!--begin: Datatable -->
            <div class="kt-datatable" id="users_datatable" data-logged-id="{{ auth()->user()->id }}"></div>
            <!--end: Datatable -->
        </div>
    </div>
    <!--end::Portlet-->

@endsection
