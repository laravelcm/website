@extends('core::admin.master')

@section('title', $model->present()->name)

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['module' => 'forums'])
        <h1 class="header-title @if (!$model->present()->name)text-muted @endif">
            {{ $model->present()->name ?: __('Untitled') }}
        </h1>
    </div>

    {!! BootForm::open()->put()->action(route('admin::update-forum', $model->id))->multipart()->role('form') !!}
    {!! BootForm::bind($model) !!}
        @include('forums::admin._form')
    {!! BootForm::close() !!}

@endsection
