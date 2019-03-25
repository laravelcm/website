@extends('core::admin.master')

@section('title', __('New partner'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'partners'])
        <h1 class="header-title">@lang('New partner')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-partners'))->multipart()->role('form') !!}
        @include('partners::admin._form')
    {!! BootForm::close() !!}

@endsection
