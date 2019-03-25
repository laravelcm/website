@extends('core::admin.master')

@section('title', 'Error 404')

@section('bodyClass', 'error-404')

@section('content')

    <article class="http-error-message">
        <h2>@lang('db.Sorry, this page was not found').</h2>
    </article>

@endsection
