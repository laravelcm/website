@extends('core::admin.master')

@section('title', __('New role'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'roles'])
        <h1 class="header-title">@lang('New role')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-roles'))->multipart()->role('form') !!}
        @include('roles::admin._form')
    {!! BootForm::close() !!}

@endsection
