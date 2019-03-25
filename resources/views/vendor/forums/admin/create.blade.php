@extends('core::admin.master')

@section('title', __('New forum category'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'forums'])
        <h1 class="header-title">@lang('New forum category')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-forums'))->multipart()->role('form') !!}
        @include('forums::admin._form')
    {!! BootForm::close() !!}

@endsection
