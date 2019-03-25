@extends('core::public.master')

@section('title', $model->title.' – '.__('Packages').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-packages body-package-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Packages', 'model' => $model])

    <article class="package">
        <h1 class="package-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="package-summary">{{ nl2br($model->summary) }}</p>
        <div class="package-body">{!! $model->present()->body !!}</div>
        @include('files::public._documents')
        @include('files::public._images')
    </article>

@endsection
