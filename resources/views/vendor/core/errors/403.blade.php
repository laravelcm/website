@extends('core::public.master')

@section('title', 'Error 403 – '.$websiteTitle)

@section('bodyClass', 'error-403')

@section('content')

    <article class="http-error-message">
        <h2>@lang('db.Sorry, you are not authorized to view this page').</h2>
        <p>
            {!! trans('db.Go to our homepage?', ['a_open' => '<a href="/">', 'a_close' => '</a>']) !!}
        </p>
    </article>

@endsection
