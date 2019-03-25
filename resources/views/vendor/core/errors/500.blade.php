@extends('core::public.master')

@section('title', 'Error 500 – '.$websiteTitle)

@section('bodyClass', 'error-500')

@section('langSwitcher') @endsection

@section('content')

    <article class="http-error-message">
        <h2>@lang('db.Sorry, a server error occurred').</h2>
        <p>
            {!! trans('db.Error :code', ['code' => '500']) !!}.
        </p>
    </article>

@endsection
