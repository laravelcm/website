@extends('pages::public.master')

@section('bodyClass', 'body-forums body-forums-index body-page body-page-'.$page->id)

@section('content')

    {!! $page->present()->body !!}
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci nam natus nulla
        odio omnis quis suscipit ut veniam? Autem consequatur
        corporis, et numquam odit ratione recusandae sunt! Alias distinctio, molestias.
    </p>

@endsection
