@extends('core::admin.master')

@section('title', __('New tutorial'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'tutorials'])
        <h1 class="header-title">@lang('New tutorial')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-tutorials'))->multipart()->role('form') !!}
        @include('tutorials::admin._form')
    {!! BootForm::close() !!}

@endsection
