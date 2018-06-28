@extends('layouts.app')
@section('title', __('Blog'))

@section('content')

    <header class="page-header">
        <div class="container">
            <h1 class="page__title">{{ __('Blog') }}</h1>
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

    <section class="posts">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="grid-2">
                        @for($i = 1; $i <= 6; $i++)
                        <article class="card">
                            <div class="card__thumb">
                                <img src="{{ asset('img/post-1.png') }}" alt="post 1 thumb">
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
                </div>
                <div class="col-sm-12 col-md-4 adwords">
                    @include('frontend.partials.sidebar', ['name' => __('Total Posts'), 'value' => 20])
                </div>
            </div>
        </div>
    </section>

@endsection
