@extends('layouts.master')
@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('breadcrumb-links')
    <a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="kt-tooltip" title="Reports" data-placement="top"><i class="flaticon2-writing"></i></a>
    <a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="kt-tooltip" title="Calendar" data-placement="top"><i class="flaticon2-hourglass-1"></i></a>
    <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="top">
        <a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="dropdown" data-offset="0px,0px" aria-haspopup="true" aria-expanded="false"> <i class="flaticon2-add-1"></i> </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <ul class="kt-nav kt-nav--active-bg" role="tablist">
                <li class="kt-nav__item">
                    <a href="" class="kt-nav__link"> <i class="kt-nav__link-icon flaticon2-psd"></i> <span class="kt-nav__link-text">Document</span> </a>
                </li>
                <li class="kt-nav__item">
                    <a class="kt-nav__link" role="tab" > <i class="kt-nav__link-icon flaticon2-supermarket"></i> <span class="kt-nav__link-text">Message</span> </a>
                </li>
                <li class="kt-nav__item">
                    <a href="" class="kt-nav__link"> <i class="kt-nav__link-icon flaticon2-shopping-cart"></i> <span class="kt-nav__link-text">Product</span> </a>
                </li>
                <li class="kt-nav__item">
                    <a class="kt-nav__link" role="tab" >
                        <i class="kt-nav__link-icon flaticon2-chart2"></i> <span class="kt-nav__link-text">Report</span>
                        <span class="kt-nav__link-badge"> <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded">pdf</span> </span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="" class="kt-nav__link"> <i class="kt-nav__link-icon flaticon2-sms"></i> <span class="kt-nav__link-text">Post</span> </a>
                </li>
                <li class="kt-nav__item">
                    <a href="" class="kt-nav__link"> <i class="kt-nav__link-icon flaticon2-avatar"></i> <span class="kt-nav__link-text">Customer</span> </a>
                </li>
            </ul>
        </div>
    </div>
    <a href="#" class="btn btn-sm btn-elevate btn-brand btn-elevate" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="" data-placement="left" data-original-title="Select dashboard daterange">
        <span class="kt-opacity-7" id="kt_dashboard_daterangepicker_title">Today:</span>&nbsp;
        <span class="kt-font-bold" id="kt_dashboard_daterangepicker_date">Jan 11</span>
        <i class="flaticon-calendar-with-a-clock-time-tools kt-padding-l-5 kt-padding-r-0"></i>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>@lang('strings.backend.dashboard.welcome') {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <p>Welcome to the Blank Page</p>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
