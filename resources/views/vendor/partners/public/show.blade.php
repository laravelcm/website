@extends('core::public.master')

@section('title', $model->title.' – '.__('Partners').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-partners body-partner-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Partners', 'model' => $model])

    <article class="partner">
        <h1 class="partner-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="partner-website">
            <a class="partner-website-link" href="{{ $model->website }}" target="_blank" rel="noopener noreferrer">{{ $model->website }}</a>
        </p>
        <p class="partner-summary">{{ nl2br($model->summary) }}</p>
        <div class="partner-body">{!! $model->present()->body !!}</div>
    </article>

@endsection
