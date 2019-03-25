@extends('pages::public.master')
@section('bodyClass', 'body-news body-news-index body-page body-page-'.$page->id)

@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">@lang('db.Blog')</h1>
            </div>
        </div>
    </header>

    <section class="posts">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    @includeWhen($models->count() > 0, 'news::public._list', ['items' => $models])
                    <div class="paginations">
                        <?php $pagination = $models->toArray(); ?>
                        @if(!is_null($pagination['prev_page_url']))
                            <a href="{{ $pagination['prev_page_url'] }}" class="btn btn-primary pagination__left"><i class="icon ion-ios-arrow-back"></i> {{ __('Newer Posts') }}</a>
                        @endif

                        @if(!is_null($pagination['next_page_url']))
                            <a href="{{ $pagination['next_page_url'] }}" class="btn btn-primary pagination__right">{{ __('Older Posts') }} <i class="icon ion-ios-arrow-forward"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('pages::public.partials.sidebar', ['name' => __('Total Posts'), 'value' => $models->count(), 'hide' => false])
                </div>
            </div>
        </div>
    </section>

@endsection
