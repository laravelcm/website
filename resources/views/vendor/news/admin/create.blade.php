@extends('core::admin.master')

@section('title', __('New news'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'news'])
        <h1 class="header-title">@lang('New news')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::index-news'))->multipart()->role('form') !!}
        @include('news::admin._form')
    {!! BootForm::close() !!}

@endsection
