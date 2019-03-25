@extends('core::admin.master')

@section('title', __('New page section'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['url' => route('admin::edit-page', $page)])
        <h1 class="header-title">@lang('New page section')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::store-page_section', $page->id))->multipart()->role('form') !!}
        @include('pages::admin._form-section')
    {!! BootForm::close() !!}

@endsection
