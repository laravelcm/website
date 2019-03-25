@extends('core::public.master')
@section('title', $page->title.' – '.$websiteTitle)
@section('ogTitle', $page->title)
@section('description', $page->meta_description)
@section('keywords', $page->meta_keywords)
@section('bodyClass', 'body-page body-page-'.$page->id)

@if($page->image)
    @section('image', url($page->present()->thumbSrc()))
@endif

@if($page->css)
    @push('css')
        <style type="text/css">{{ $page->css }}</style>
    @endpush
@endif

@section('content')

    @yield('page')

@endsection

@if($page->js)
    @push('js')
        <script>{!! $page->js !!}</script>
    @endpush
@endif
