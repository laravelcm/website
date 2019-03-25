@extends('pages::public.master')

@section('bodyClass', 'body-packages body-packages-index body-page body-page-'.$page->id)

@section('content')

    <header class="page-header big_header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('Packages') }}</h1>
                <p>
                    {{ __('Do you want to code a module without going from zero? This section offers packages made for Laravel framework') }}
                </p>
            </div>
        </div>
    </header>

    <div class="adwords lcm-2"></div>

    <section class="packages">
        <div class="container">
            @includeWhen($models->count() > 0, 'packages::public._list', ['items' => $models])
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
