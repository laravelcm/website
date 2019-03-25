@extends('pages::public.master')

@section('bodyClass', 'body-tutorials body-tutorials-index body-page body-page-'.$page->id)

@section('content')

    <header class="page-header big_header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('Tutorials') }}</h1>
                <p>
                    {{ __('Interested in learning more about Laravel? This section features tutorials on everything from getting started with Laravel, to expert topics, and everything in between.') }}
                </p>
            </div>
        </div>
    </header>

    <section class="tutorials">
        <div class="container">
            @includeWhen($models->count() > 0, 'tutorials::public._list', ['items' => $models])
            <div class="paginations">
                <?php $pagination = $models->toArray(); ?>
                @if(!is_null($pagination['prev_page_url']))
                    <a href="{{ $pagination['prev_page_url'] }}" class="btn btn-primary pagination__left"><i class="icon ion-ios-arrow-back"></i> {{ __('Newer Tutorials') }}</a>
                @endif

                @if(!is_null($pagination['next_page_url']))
                    <a href="{{ $pagination['next_page_url'] }}" class="btn btn-primary pagination__right">{{ __('Older Tutorials') }} <i class="icon ion-ios-arrow-forward"></i></a>
                @endif
            </div>
        </div>
    </section>

@endsection
