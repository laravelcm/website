@extends('core::admin.master')

@section('title', __('New event'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'events'])
        <h1 class="header-title">@lang('New event')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-events'))->multipart()->role('form') !!}
        @include('events::admin._form')
    {!! BootForm::close() !!}

@endsection
