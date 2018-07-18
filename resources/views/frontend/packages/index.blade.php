@extends('layouts.app')
@if(is_null($category))@section('title', __('Packages'))@else @section('title', __('Packages') . ' | ' . $category->name) @endif

@section('content')

    <header class="page-header {{ (is_null($category)) ? 'big_header' : ''}}">
        <div class="container">
            <div class="header__text">
                @if(is_null($category))
                    <h1 class="page__title">{{ __('Packages') }}</h1>
                    <p>
                        {{ __('Do you want to code a module without going from zero? This section offers packages made for Laravel framework') }}
                    </p>
                @else
                    <h1 class="page__title">{{ $category->name }}</h1>
                @endif
            </div>
            <div class="header__link">
                <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Categories') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('packages') }}">{{ __('All') }}</a>
                        @foreach($categories as $c)
                            <a class="dropdown-item" href="{{ route('packages.category', ['slug' => $c->slug]) }}">{{ $c->name }}</a>
                        @endforeach
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
                        @foreach($packages as $package)
                            <article class="card">
                                <div class="card__thumb">
                                    <img src="{{ asset("storage/$package->image") }}" alt="Package thumb">
                                </div>
                                <div class="card__content">
                                    <span class="card__content--date">{{ $package->created_at->format('M d, Y') }}</span>
                                    <h4 class="card__content--title">
                                        <a href="{{ route('packages.post', ['slug' => $package->slug]) }}">{{ $package->title }}</a>
                                    </h4>
                                    <p class="card__content--summary">
                                        {{ str_limit($package->resume, 130) }}
                                    </p>
                                    <ul class="card__links">
                                        <li class="author_link">
                                            {{ __('by') }} <a href="javascript:;">{{ $package->user->name }}</a>
                                        </li>
                                        <li class="view_link">
                                            <i class="fa fa-eye"></i> {{ $package->getViews().' '. __('views') }}
                                        </li>
                                        <li class="read_link">
                                            <a href="{{ route('packages.post', ['slug' => $package->slug]) }}">{{ __('Read More') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="paginations">
                        <?php $pagination = $packages->toArray(); ?>
                        @if(!is_null($pagination['prev_page_url']))
                            <a href="{{ $pagination['prev_page_url'] }}" class="btn btn-primary pagination__left"><i class="icon ion-ios-arrow-back"></i> {{ __('Newer Posts') }}</a>
                        @endif

                        @if(!is_null($pagination['next_page_url']))
                            <a href="{{ $pagination['next_page_url'] }}" class="btn btn-primary pagination__right">{{ __('Older Posts') }} <i class="icon ion-ios-arrow-forward"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('frontend.partials.sidebar', ['name' => __('Total Packages'), 'value' => $total, 'hide' => false])
                </div>
            </div>
            <div class="adwords lcm-2"></div>
        </div>
    </section>

@endsection
