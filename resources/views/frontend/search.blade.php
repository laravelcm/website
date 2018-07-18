@extends('layouts.app')
@section('title', __('Search Results'))

@section('content')

    <section class="search">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    @if(count(request()->query()) > 0)
                        <h3 class="search-query">{{ __('Results for : ') }} "{{ request()->get('q') }}"</h3>
                        <div class="grid-2">
                        @foreach($results as $result)
                            <article class="card">
                                <div class="card__thumb">
                                    <img src="{{ asset("storage/{$result->image}") }}" alt="post thumb">
                                </div>
                                <div class="card__content">
                                    <span class="card__content--date">{{ $result->created_at->format('M d, Y') }}</span>
                                    <h4 class="card__content--title">
                                        <a href="{{ route($result->url, ['slug' => $result->slug]) }}">{{ $result->title }}</a>
                                    </h4>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    @else
                        <div class="card no-search">
                            <h3>{{ __('And so for a time it looked as if all the adventures were coming to and end; but that was not to be.') }}</h3>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12 col-md-4">
                    @include('frontend.partials.sidebar', ['name' => __('Search Results'), 'value' => $total, 'hide' => false])
                </div>
            </div>
            <div class="adwords lcm-2"></div>
        </div>
    </section>

@endsection
