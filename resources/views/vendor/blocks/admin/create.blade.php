@extends('core::admin.master')

@section('title', __('New content block'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'blocks'])
        <h1 class="header-title">@lang('New content block')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-blocks'))->multipart()->role('form') !!}
        @include('blocks::admin._form')
    {!! BootForm::close() !!}

@endsection
