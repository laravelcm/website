@extends('core::admin.master')

@section('title', 'Error 403')

@section('bodyClass', 'error-403')

@section('content')

    <article class="http-error-message">
        <h2>{{ __($exception->getMessage()) }}</h2>
    </article>

@endsection
