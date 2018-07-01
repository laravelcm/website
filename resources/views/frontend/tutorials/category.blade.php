@extends('layouts.app')
@section('title', __('Toturials') . ' | ' . $category->name)

@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">
                    {{ $category->name }}
                </h1>
            </div>
            <div class="header__link">
                <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Categories') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('tutorials') }}">{{ __('All') }}</a>
                        @foreach($categories as $c)
                            <a class="dropdown-item" href="{{ route('tutorials.category', ['slug' => $c->slug]) }}">{{ $c->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="tutorials">
        <div class="container">
            <header class="block_header">
                <h2 class="block__title popular-tutorials__title">{{ $category->name .' '. __('Tutorials') }}</h2>
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
                                    <i class="fa fa-eye"></i> 1250 {{ __('views') }}
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

@stop
