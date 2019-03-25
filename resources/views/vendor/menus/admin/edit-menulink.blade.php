@extends('core::admin.master')

@section('title', $model->title)

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['url' => route('admin::edit-menu', $menu)])
        <h1 class="header-title">{{ $model->present()->title }}</h1>
    </div>

    {!! BootForm::open()->put()->action(route('admin::update-menulink', [$menu->id, $model->id]))->multipart() !!}
    {!! BootForm::bind($model) !!}
        @include('menus::admin._form-menulink')
    {!! BootForm::close() !!}

@endsection
