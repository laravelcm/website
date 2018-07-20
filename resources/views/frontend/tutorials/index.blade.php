@extends('layouts.app')
@section('title', __('Tutorials'))

@section('content')

    <header class="page-header big_header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('Tutorials') }}</h1>
                <p>
                    {{ __('Interested in learning more about Laravel? This section features tutorials on everything from getting started with Laravel, to expert topics, and everything in between.') }}
                </p>
            </div>
            <div class="header__link">
                <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Categories') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('tutorials') }}">{{ __('All') }}</a>
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ route('tutorials.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="popular-tutorials">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <header class="block_header">
                        <h2 class="block__title popular-tutorials__title">{{ __('Popular Tutorials') }}</h2>
                    </header>
                    <div class="grid-2">
                        @foreach($populars as $popular)
                            <article class="card">
                                <div class="card__thumb">
                                    <img src="{{ asset("storage/$popular->image") }}" alt="Tutorial thumb">
                                </div>
                                <div class="card__content">
                                    <span class="card__content--date">{{ $popular->created_at->format('M d, Y') }}</span>
                                    <h4 class="card__content--title">
                                        <a href="{{ route('tutorials.post', ['slug' => $popular->slug]) }}">{{ $popular->title }}</a>
                                    </h4>
                                    <p class="card__content--summary">
                                        {{ str_limit($popular->resume, 130) }}
                                    </p>
                                    <ul class="card__links">
                                        <li class="view_link">
                                            <i class="fa fa-eye"></i> {{ $popular->getViews().' '. __('views') }}
                                        </li>
                                        <li class="read_link">
                                            <a href="{{ route('tutorials.post', ['slug' => $popular->slug]) }}">{{ __('Read More') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="adwords lcm-1"></div>
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('frontend.partials.sidebar', ['name' => __('Total Tutorials'), 'value' => $total, 'hide' => false])
                </div>
            </div>
        </div>
    </section>

    <section class="tutorials">
        <div class="container">
            <header class="block_header">
                <h2 class="block__title popular-tutorials__title">{{ __('Lastest Tutorials') }}</h2>
            </header>
            <div class="grid-3">
                @foreach($tutorials as $tutorial)
                    <article class="card">
                        <div class="card__thumb">
                            <img src="{{ asset("storage/$tutorial->image") }}" alt="Tutorial thumb">
                        </div>
                        <div class="card__content">
                            <span class="card__content--date">{{ $tutorial->created_at->format('M d, Y') }}</span>
                            <h4 class="card__content--title">
                                <a href="{{ route('tutorials.post', ['slug' => $tutorial->slug]) }}">{{ $tutorial->title }}</a>
                            </h4>
                            <p class="card__content--summary">
                                {{ str_limit($tutorial->resume, 130) }}
                            </p>
                            <ul class="card__links">
                                <li class="view_link">
                                    <i class="fa fa-eye"></i> {{ $tutorial->getViews().' '. __('views') }}
                                </li>
                                <li class="read_link">
                                    <a href="{{ route('tutorials.post', ['slug' => $tutorial->slug]) }}">{{ __('Read More') }}</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="paginations">
                <?php $pagination = $tutorials->toArray(); ?>
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
