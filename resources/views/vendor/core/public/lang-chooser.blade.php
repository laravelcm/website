@extends('core::public.master')

@section('lang-switcher') @endsection
@section('site-header') @endsection
@section('site-nav') @endsection
@section('site-footer') @endsection
@section('bodyClass') lang-chooser @endsection
@section('skip-links') @endsection

@section('content')

    <div class="page-header lang-chooser-header">
        <h1 class="lang-chooser-title">Choose language</h1>
    </div>

    <ul class="lang-chooser-list">
        @foreach ($locales as $locale)
            <li class="lang-chooser-list-item">
                <a class="lang-chooser-list-anchor" href="{{ url($homepage->uri($locale)) }}">{{ __('db.languages.'.$locale) }}</a>
            </li>
        @endforeach
    </ul>

@endsection
