@extends('core::admin.master')

@section('title', __('New user'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'users'])
        <h1 class="header-title">@lang('New user')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-users'))->multipart()->role('form') !!}
        @include('users::admin._form')
    {!! BootForm::close() !!}

@endsection
