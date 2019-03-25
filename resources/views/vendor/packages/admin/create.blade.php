@extends('core::admin.master')

@section('title', __('New package'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'packages'])
        <h1 class="header-title">@lang('New package')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-packages'))->multipart()->role('form') !!}
        @include('packages::admin._form')
    {!! BootForm::close() !!}

@endsection
