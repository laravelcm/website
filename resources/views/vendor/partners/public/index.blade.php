@extends('pages::public.master')

@section('bodyClass', 'body-partners body-partners-index body-page body-page-'.$page->id)

@section('content')

    {!! $page->present()->body !!}

    @include('files::public._documents', ['model' => $page])
    @include('files::public._images', ['model' => $page])

    @includeWhen($models->count() > 0, 'partners::public._list', ['items' => $models])

@endsection
