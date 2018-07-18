@extends('layouts.app')
@section('title', __('The best Laravel & PHP developers in Cameroon'))

@section('meta')
    <meta name="description" content="Laravel Cameroon is the biggest Laravel community and meetup event in Cameroon
     that brings together the best Laravel and PHP developers in Cameroon.">
    <!-- Facebook Meta -->
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:title" content="The best Laravel PHP developers in Cameroon - Laravel Cameroon">
    <meta property="og:image" content="{{ asset('img/laravel-cm-cover.png') }}">
    <meta property="og:description" content="Laravel Cameroon is the biggest Laravel community and meetup event in Cameroon
     that brings together the best Laravel and PHP developers in Cameroon.">
    <!-- Twitter Meta -->
    <meta name="twitter:url" content="{{ route('home') }}">
    <meta name="twitter:title" content="The best Laravel PHP developers in Cameroon - Laravel Cameroon">
    <meta name="twitter:description" content="Laravel Cameroon is the biggest Laravel community and meetup event in Cameroon
     that brings together the best Laravel and PHP developers in Cameroon.">
    <meta name="twitter:image" content="{{ asset('img/laravel-cm-cover.png') }}">
@endsection

@section('content')

    <section class="hero">
        <div class="container">
            <h1>{{ __('Welcome to the website of the PHP and Laravel developers community of Cameroon') }}</h1>
        </div>
    </section>

    <section class="partners">
        <div class="container">
            <ul class="partners__list owl-carousel" id="partners_carousel">
                <li class="partner item">
                    <a href="https://diool.com">
                        <img src="{{ asset('img/partners/logo-diool.svg') }}" alt="Diool Logo">
                    </a>
                </li>
                <li class="partner item">
                    <a href="https://www.johns-corporation.com">
                        <img src="{{ asset('img/partners/logo-jc.svg') }}" alt="John's Corporation Logo">
                    </a>
                </li>
                <li class="partner item">
                    <a href="http://www.deelynx.com/">
                        <img src="{{ asset('img/partners/deelynx-logo.svg') }}" alt="Deelynx Logo">
                    </a>
                </li>
                <li class="partner item">
                    <a href="http://geekofcode.com/">
                        <img src="{{ asset('img/partners/geekofcode-logo.svg') }}" alt="Geek OF Code Logo">
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="posts-events">
        <div class="container">
            <div class="row">
                <div class="lastest-post">
                    <header class="block_header">
                        <h2 class="block__title lastest-post__title">{{ __('Last Posts') }}</h2>
                        <a href="{{ route('blog') }}" class="block__link">{{ __('All posts') }}</a>
                    </header>
                    <div class="last-posts">
                        @foreach($posts as $post)
                            <article class="last_post">
                                <time class="last-post__date">{{ $post->created_at->format('M d, Y') }}</time>
                                <h6 class="last-post__title"><a href="{{ route('blog.post', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h6>
                                <p class="last-post__summary">
                                    {{ str_limit($post->excerpt, 60) }}
                                </p>
                                <a href="javascript:;" class="last-post__author"><span>{{ __('by') }}</span> {{ $post->authorId->name }}</a>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="next-event">
                    <h2 class="next-event__title">{{ __('Next Event') }}</h2>
                    <div class="event">
                        <div class="event__thumb">
                            <img src="https://ucarecdn.com/3cf97be3-9792-4b98-8280-5a62392475bf/laraconus.png" alt="laravel event">
                        </div>
                        <div class="event__content">
                            <span class="event__content-date">Jul 25, 2018</span>
                            <h6 class="event__content-title">
                                <a href="http://laracon.us/" target="_blank">
                                    Laracon US
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="tutorial-intro">
            <div class="row">
                <div class="tutorial__content">
                    <h2 class="tutorial__title">{{ __('Tutorials') }}</h2>
                    <p class="tutorial__description">
                        {{ __('Laravel is a powerful MVC PHP framework, designed for developers who need a simple and elegant toolkit to create full-featured web applications. Here you can find plenty of tutorials resources who will teach you how to make a website with Laravel. Explore a big collection of tutorials, latest news and tips from Laravel devs around the world.') }}
                    </p>
                    <a href="{{ route('tutorials') }}" class="btn btn-primary">{{ __('Jump to Tutorials') }} <i class="icon ion-ios-arrow-forward"></i></a>
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
                    <h2 class="package__title">{{ __('Packages') }}</h2>
                    <p class="package__description">
                        {{ __('Laravel is a very popular framework, and says popularity says big community. Find in this section a list of packages that can help you quickly build your application, examples of use of packages and links to download them.') }}
                    </p>
                    <a href="{{ route('packages') }}" class="btn btn-primary">{{ __('See all Packages') }} <i class="icon ion-ios-arrow-forward"></i></a>
                </div>
            </div>
        </section>
    </div>

    <section class="slack">
        <div class="container">
            <div class="row justify-content-center">
                <div class="slack__content">
                    <img src="{{ asset('img/logo-full.svg') }}" alt="Logo laravelcm">
                    <h5>{{ __('Join the Laravel Cameroon community on Slack') }}</h5>
                    <form action="{{ route('slack.invite') }}" method="POST">
                        @csrf
                        <input type="email" name="email" class="form-control" placeholder="What is your email address ?">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Get My Invite') }}</button>
                    </form>
                    <a href="https://laravelcm.slack.com" target="_blank">{{ __('Jump to Slack Channel') }}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="sponsors">
        <div class="container">
            <h2 class="sponsors__title">{{ __('Our Sponsors') }}</h2>
            <p class="sponsors_text">{{ __('The companies that help make the community a success.') }}</p>
            <ul class="sponsors_list">
                <li class="sponsor">
                    <a href="https://www.johns-corporation.com" class="jc_sponsor">
                        <img src="{{ asset('img/partners/logo-jc.svg') }}" alt="John's Corporation Logo">
                    </a>
                </li>
                <li class="sponsor">
                    <a href="https://diool.com" class="diool_sponsor">
                        <img src="{{ asset('img/partners/logo-diool.svg') }}" alt="Diool Logo">
                    </a>
                </li>
                <li class="sponsor">
                    <a href="http://www.deelynx.com/" class="deelynx_sponsor">
                        <img src="{{ asset('img/partners/deelynx-logo.svg') }}" alt="Deelynx Logo">
                    </a>
                </li>
            </ul>
            <a href="javascript:;" class="btn btn-primary" target="_blank">{{ __('Become a Sponsor') }} <i class="icon ion-ios-arrow-forward"></i></a>
        </div>
    </section>

    <section class="events">
        <div class="container">
            <header class="block_header">
                <h2 class="block__title">{{ __('Upcomming Events') }}</h2>
                <a href="https://laravelevents.com" class="block__link" target="_blank">{{ __('View all') }}</a>
            </header>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="event">
                        <div class="event__thumb">
                            <img src="https://ucarecdn.com/3cf97be3-9792-4b98-8280-5a62392475bf/laraconus.png" alt="laravel event">
                        </div>
                        <div class="event__content">
                            <span class="event__content-date">Jul 25, 2018</span>
                            <h6 class="event__content-title">
                                <a href="http://laracon.us/" target="_blank">
                                    Laracon US
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="event">
                        <div class="event__thumb">
                            <img src="https://ucarecdn.com/4ddfc653-d819-48e9-bd31-be5ad7cfbac9/vSrhGE5dsgeyB2AzPXSC7K5Cnc2xiFlvQvu75vWW.png" alt="laravel event">
                        </div>
                        <div class="event__content">
                            <span class="event__content-date">Jul 25, 2018</span>
                            <h6 class="event__content-title">
                                <a href="https://www.meetup.com/Ohio-Laravel/events/252272148/" target="_blank">
                                    Ohio Laravel July Meetup
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="event">
                        <div class="event__thumb">
                            <img src="https://ucarecdn.com/4ba0a49c-5ea6-4f37-8966-b88b24cec7c7/-/resize/1400x700/" alt="laravel event">
                        </div>
                        <div class="event__content">
                            <span class="event__content-date">Jul 26, 2018</span>
                            <h6 class="event__content-title">
                                <a href="https://www.meetup.com/Laravel-Mcr/events/pkcrwpyxkbjc/" target="_blank">
                                    Laravel Manchester Meetup
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
