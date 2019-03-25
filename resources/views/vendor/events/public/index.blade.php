@extends('pages::public.master')

@section('bodyClass', 'body-events body-events-index body-page body-page-'.$page->id)

@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">@lang('db.Events')</h1>
            </div>
        </div>
    </header>

    <section class="events events-page">
        <div class="container">
            @includeWhen($models->count() > 0, 'events::public._list', ['items' => $models])

            <div class="paginations">
                {!! $models->appends(Request::except('page'))->links() !!}
            </div>
        </div>
    </section>

@endsection
