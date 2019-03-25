@extends('core::admin.master')

@section('title', __('New file'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'files'])
        <h1 class="header-title">@lang('New file')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-files'))->multipart()->role('form') !!}
        @include('files::admin._form')
    {!! BootForm::close() !!}

@endsection
