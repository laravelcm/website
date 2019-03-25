@extends('core::admin.master')

@section('title', __('New translation'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'translations'])
        <h1 class="header-title">@lang('New translation')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-translations'))->multipart()->role('form') !!}
        @include('translations::admin._form')
    {!! BootForm::close() !!}

@endsection
