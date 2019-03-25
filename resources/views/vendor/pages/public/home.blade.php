@extends('pages::public.master')

@section('page')

    <section class="hero">
        <div class="container">
            <h1>@lang('db.Welcome to the website of the PHP and Laravel developers community of Cameroon')</h1>
        </div>
    </section>

    @if ($partners = Partners::allBy('homepage', 1) and $partners->count() > 0)
        <section class="partners">
            <div class="container">
                @include('partners::public._list', ['items' => $partners])
            </div>
        </section>
    @endif

    <section class="posts-events">
        <div class="container">
            <div class="row">
                <div class="lastest-post">
                    <header class="block_header">
                        <h2 class="block__title lastest-post__title">@lang('db.Lastest Tutorials')</h2>
                        <a href="#" class="block__link">@lang('db.All tutorials')</a>
                    </header>
                    <div class="last-posts">

                    </div>
                </div>
                <div class="next-event">
                    <h2 class="next-event__title">@lang('db.Next Event')</h2>
                    @if ($upcomingEvents = Events::upcoming() and $upcomingEvents->count() > 0)
                        @php
                            $nextEvent = $upcomingEvents->first()
                        @endphp
                        <div class="event">
                            <div class="event__thumb">
                                {!! $nextEvent->present()->thumb(350, 150) !!}
                            </div>
                            <div class="event__content">
                                <span class="event__content-date">{!! $nextEvent->present()->dateFromTo !!}</span>
                                <h6 class="event__content-title">
                                    <a href="{{ $nextEvent->uri() }}" itemprop="url">{{ $nextEvent->title }}</a>
                                </h6>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="tutorial-intro">
            <div class="row">
                <div class="tutorial__content">
                    <h2 class="tutorial__title">@lang('db.Tutorials')</h2>
                    <p class="tutorial__description">
                        @lang('db.Laravel is a powerful MVC PHP framework, designed for developers who need a simple and elegant toolkit to create full-featured web applications. Here you can find plenty of tutorials resources who will teach you how to make a website with Laravel. Explore a big collection of tutorials, latest news and tips from Laravel devs around the world.')
                    </p>
                    <a href="#" class="btn btn-primary">@lang('db.Jump to Tutorials') <i class="icon ion-ios-arrow-forward"></i></a>
                </div>
                <div class="tutorial__thumb">
                    <img src="{{ asset('img/tutorial.svg') }}" alt="tutorial illustration">
                </div>
            </div>
        </section>
        <section class="package-intro">
            <div class="row">
                <div class="package__thumb">
                    <img src="{{ asset('img/package.svg') }}" alt="package illustration">
                </div>
                <div class="package__content">
                    <h2 class="package__title">@lang('db.Packages')</h2>
                    <p class="package__description">
                        @lang('db.Laravel is a very popular framework, and says popularity says big community. Find in this section a list of packages that can help you quickly build your application, examples of use of packages and links to download them.')
                    </p>
                    <a href="#" class="btn btn-primary">@lang('db.See all Packages') <i class="icon ion-ios-arrow-forward"></i></a>
                </div>
            </div>
        </section>
    </div>

    <section class="slack">
        <div class="container">
            <div class="row justify-content-center">
                <div class="slack__content">
                    <img src="{{ asset('img/logo-full.svg') }}" alt="Logo laravelcm">
                    <h5>@lang('db.Join the Laravel Cameroon community on Slack')</h5>
                    <form action="{{ route('slack.invite') }}" method="POST">
                        @csrf
                        <input type="email" name="email" class="form-control" placeholder="@lang('db.What is your email address ?')">
                        <button type="submit" class="btn btn-primary btn-block">@lang('db.Get My Invite')</button>
                    </form>
                    <a href="https://laravelcm.slack.com" target="_blank">@lang('db.Jump to Slack Channel')</a>
                </div>
            </div>
        </div>
    </section>

    @include('pages::public.partials.sponsors')

{{--
    @if ($latestNews = News::latest(3) and $latestNews->count() > 0)
        <div class="news-container">
            <h3><a href="{{ Route::has($lang.'::index-news') ? route($lang.'::index-news') : '/' }}">@lang('db.Latest news')</a></h3>
            @include('news::public._list', ['items' => $latestNews])
            <a href="{{ Route::has($lang.'::index-news') ? route($lang.'::index-news') : '/' }}" class="btn btn-light btn-xs">@lang('db.All news')</a>
        </div>
    @endif
--}}

    @if ($upcomingEvents = Events::upcoming() and $upcomingEvents->count() > 0)
        <section class="events">
            <div class="container">
                <header class="block_header">
                    <h2 class="block__title">@lang('db.Upcomming Events')</h2>
                    <a href="{{ Route::has($lang.'::index-events') ? route($lang.'::index-events') : '/' }}" class="block__link" target="_blank">@lang('db.All events')</a>
                </header>
                @include('events::public._list', ['items' => $upcomingEvents])
            </div>
        </section>
    @endif

@endsection
