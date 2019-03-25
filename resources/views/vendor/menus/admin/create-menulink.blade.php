@extends('core::admin.master')

@section('title', __('New menulink'))

@section('content')

    <div class="header">
        @include('core::admin._button-back', ['url' => route('admin::edit-menu', $menu)])
        <h1 class="header-title">@lang('New menulink')</h1>
    </div>

    {!! BootForm::open()->action(route('admin::store-menulink', $menu->id))->multipart() !!}
        @include('menus::admin._form-menulink')
    {!! BootForm::close() !!}

@endsection
