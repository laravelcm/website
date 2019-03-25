@extends('core::admin.master')

@section('title', __('New tag'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'tags'])
        <h1 class="header-title">@lang('New tag')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-tags'))->multipart()->role('form') !!}
        @include('tags::admin._form')
    {!! BootForm::close() !!}

@endsection
