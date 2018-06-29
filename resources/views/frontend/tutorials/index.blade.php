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
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
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
                        @for($i = 1; $i <= 2; $i++)
                            <article class="card">
                                <div class="card__thumb">
                                    <img src="{{ asset('img/post-2.png') }}" alt="Tutorial thumb">
                                </div>
                                <div class="card__content">
                                    <span class="card__content--date">12 June, 2018</span>
                                    <h4 class="card__content--title">
                                        <a href="javascript:;">Laravel Tenancy – Multi-Tenant Package for Laravel</a>
                                    </h4>
                                    <p class="card__content--summary">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias,
                                        animi architecto asperiores deleniti dolor eius error et...
                                    </p>
                                    <ul class="card__links">
                                        <li class="view_link">
                                            <i class="fa fa-eye"></i> 1250 {{ __('views') }}
                                        </li>
                                        <li class="read_link">
                                            <a href="javascript:;">{{ __('Read More') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @endfor
                    </div>
                    <div class="adwords lcm-1"></div>
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('frontend.partials.sidebar', ['name' => __('Total Tutorials'), 'value' => 50])
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
                @for($i = 1; $i <= 6; $i++)
                    <article class="card">
                        <div class="card__thumb">
                            <img src="{{ asset('img/post-2.png') }}" alt="Tutorial thumb">
                        </div>
                        <div class="card__content">
                            <span class="card__content--date">12 June, 2018</span>
                            <h4 class="card__content--title">
                                <a href="javascript:;">Laravel Tenancy – Multi-Tenant Package for Laravel</a>
                            </h4>
                            <p class="card__content--summary">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias,
                                animi architecto asperiores deleniti dolor eius error et...
                            </p>
                            <ul class="card__links">
                                <li class="view_link">
                                    <i class="fa fa-eye"></i> 1250 {{ __('views') }}
                                </li>
                                <li class="read_link">
                                    <a href="javascript:;">{{ __('Read More') }}</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                @endfor
            </div>
            <div class="paginations">
                <a href="javascript:;" class="btn btn-primary disabled pagination__left"><i class="icon ion-ios-arrow-back"></i> {{ __('Newer Tutorials') }}</a>
                <a href="javascript:;" class="btn btn-primary pagination__right">{{ __('Older Tutorials') }} <i class="icon ion-ios-arrow-forward"></i></a>
            </div>
        </div>
    </section>

@endsection
