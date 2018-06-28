@extends('layouts.app')
@section('title', __('Packages'))

@section('content')

    <header class="page-header tutorial_header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('Packages') }}</h1>
                <p>
                    {{ __('Do you want to code a module without going from zero?
                    This section offers packages made for Laravel framework') }}
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

    <section class="packages">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="grid-1">
                        <article class="card">
                            <div class="card__thumb">
                                <img src="{{ asset('img/post-2.png') }}" alt="Tutorial thumb">
                            </div>
                            <div class="card__content">
                                <span class="card__content--date">12 June, 2018</span>
                                <h4 class="card__content--title">
                                    <a href="javascript:;">Laravel Tenancy – Multi-Tenant Package for Laravel 5.6 and Laravel Lumen</a>
                                </h4>
                                <p class="card__content--summary">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias,
                                    animi architecto asperiores deleniti dolor eius error
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias,
                                    animi architecto asperiores deleniti dolor eius error et...
                                </p>
                                <ul class="card__links">
                                    <li class="author_link">
                                        {{ __('by') }} <a href="javascript:;">Fabrice Yopa</a>
                                    </li>
                                    <li class="read_link">
                                        <a href="javascript:;">{{ __('Read More') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        @for($i = 1; $i <= 4; $i++)
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
                                        animi architecto asperiores deleniti dolor eius error
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias,
                                        animi architecto asperiores deleniti dolor eius error et...
                                    </p>
                                    <ul class="card__links">
                                        <li class="author_link">
                                            {{ __('by') }} <a href="javascript:;">Fabrice Yopa</a>
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
                        <a href="javascript:;" class="btn btn-primary disabled pagination__left">{{ __('Newer Posts') }}</a>
                        <a href="javascript:;" class="btn btn-primary pagination__right">{{ __('Older Posts') }}</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('frontend.partials.sidebar', ['name' => __('Total Packages'), 'value' => 150])
                </div>
            </div>
            <div class="adwords lcm-2"></div>
        </div>
    </section>

@endsection
