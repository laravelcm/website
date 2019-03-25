@extends('core::public.master')

@section('title', $model->title.' – '.__('Forums').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-forums body-forum-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Forums', 'model' => $model])

    <article class="forum">
        <h1 class="forum-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="forum-summary">{{ nl2br($model->summary) }}</p>
        <div class="forum-body">{!! $model->present()->body !!}</div>
        @include('files::public._documents')
        @include('files::public._images')
    </article>

@endsection
