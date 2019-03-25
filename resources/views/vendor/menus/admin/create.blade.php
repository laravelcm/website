@extends('core::admin.master')

@section('title', __('New menu'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'menus'])
        <h1 class="header-title">@lang('New menu')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-menus'))->multipart()->role('form') !!}
        @include('menus::admin._form')
    {!! BootForm::close() !!}

@endsection
