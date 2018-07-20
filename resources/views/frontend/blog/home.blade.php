@extends('layouts.app')
@if(is_null($category))@section('title', __('Blog'))@else @section('title', __('Blog') . ' | ' . $category->name) @endif

@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">
                    @if(is_null($category))
                        {{ __('Blog') }}
                    @else
                        {{ $category->name }}
                    @endif
                </h1>
            </div>
            <div class="header__link">
                <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Categories') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('blog') }}">{{ __('All') }}</a>
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ route('blog.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                        @endforeach
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
                        @foreach($posts as $post)
                        <article class="card">
                            <div class="card__thumb">
                                <img src="{{ asset("storage/{$post->image}") }}" alt="post thumb">
                            </div>
                            <div class="card__content">
                                <span class="card__content--date">{{ $post->created_at->format('M d, Y') }}</span>
                                <h4 class="card__content--title">
                                    <a href="{{ route('blog.post', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                </h4>
                                <p class="card__content--summary">
                                    {{ str_limit($post->excerpt, 130) }}
                                </p>
                                <ul class="card__links">
                                    <li class="view_link">
                                        <i class="fa fa-eye"></i> {{ $post->getViews().' '. __('views') }}
                                    </li>
                                    <li class="read_link">
                                        <a href="{{ route('blog.post', ['slug' => $post->slug]) }}">{{ __('Read More') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    <div class="paginations">
                        <?php $pagination = $posts->toArray(); ?>
                        @if(!is_null($pagination['prev_page_url']))
                            <a href="{{ $pagination['prev_page_url'] }}" class="btn btn-primary pagination__left"><i class="icon ion-ios-arrow-back"></i> {{ __('Newer Posts') }}</a>
                        @endif

                        @if(!is_null($pagination['next_page_url']))
                            <a href="{{ $pagination['next_page_url'] }}" class="btn btn-primary pagination__right">{{ __('Older Posts') }} <i class="icon ion-ios-arrow-forward"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('frontend.partials.sidebar', ['name' => __('Total Posts'), 'value' => $total, 'hide' => false])
                </div>
            </div>
        </div>
    </section>

@endsection
