@extends('layouts.app')
@section('title', __('The best Laravel PHP developers in Cameroon'))

@section('meta')
    <meta name="description" content="John's Corporation is a branding company that supports businesses,
    developers, artisans and individuals in the management of their brand image.
    We create brands, their identities and their physical and digital expressions.">
    <!-- Facebook Meta -->
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:title" content="John's Corporation Official">
    <meta property="og:image" content="{{ asset('img/website.jpg') }}">
    <meta property="og:description" content="John's Corporation is a branding company that supports businesses,
    developers, artisans and individuals in the management of their brand image. We create brands, their
    identities and their physical and digital expressions.">
    <!-- Twitter Meta -->
    <meta name="twitter:url" content="{{ route('home') }}">
    <meta name="twitter:title" content="John's Corporation Official">
    <meta name="twitter:description" content="John's Corporation is a branding company that supports businesses,
    developers, artisans and individuals in the management of their brand image. We create brands,
    their identities and their physical and digital expressions.">
    <meta name="twitter:image" content="{{ asset('img/website.jpg') }}">
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
                    <h2 class="lastest-post__title">{{ __('Last Posts') }}</h2>
                    <div class="last-posts">
                        <article class="last_post">
                            <time class="last-post__date">June 12, 2018</time>
                            <h6 class="last-post__title"><a href="javascript:;">PHP 7.3: A Look at JSON Error Handling</a></h6>
                            <p class="last-post__summary">
                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit...
                            </p>
                            <a href="javascript:;" class="last-post__author"><span>{{ __('by') }}</span> Fabrice Yopa</a>
                        </article>
                        <article class="last_post">
                            <time class="last-post__date">June 12, 2018</time>
                            <h6 class="last-post__title"><a href="javascript:;">PHP 7.3: A Look at JSON Error Handling</a></h6>
                            <p class="last-post__summary">
                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit...
                            </p>
                            <a href="javascript:;" class="last-post__author"><span>By</span> Fabrice Yopa</a>
                        </article>
                        <article class="last_post">
                            <time class="last-post__date">June 12, 2018</time>
                            <h6 class="last-post__title"><a href="javascript:;">PHP 7.3: A Look at JSON Error Handling</a></h6>
                            <p class="last-post__summary">
                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit...
                            </p>
                            <a href="javascript:;" class="last-post__author"><span>By</span> Fabrice Yopa</a>
                        </article>
                        <article class="last_post">
                            <time class="last-post__date">June 12, 2018</time>
                            <h6 class="last-post__title"><a href="javascript:;">PHP 7.3: A Look at JSON Error Handling</a></h6>
                            <p class="last-post__summary">
                                Lorem ipsum dolor sit amet, consec tetur adipiscing elit...
                            </p>
                            <a href="javascript:;" class="last-post__author"><span>By</span> Fabrice Yopa</a>
                        </article>
                    </div>
                    <a href="javascript:;" class="btn btn-primary">{{ __('All posts') }} <i class="icon ion-ios-arrow-forward"></i></a>
                </div>
                <div class="next-event">
                    <h2 class="next-event__title">{{ __('Next Event') }}</h2>
                    <div class="event">
                        <div class="event__thumb">
                            <img src="{{ asset('img/laracon.png') }}" alt="lara event">
                            <span class="event__price">{{ __('Free') }}</span>
                            <p class="event__share">
                                <a href="javascript:;">{{ __('Share') }} <i class="fa fa-share-alt"></i></a>
                            </p>
                        </div>
                        <div class="event__content">
                            <span class="event__content-date">Vendredi, 12 Juin à 18h - Akwa Douala</span>
                            <h6 class="event__content-title">
                                <a href="javascript:;">Google I/O Extended 2018 - GDG Douala</a>
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <a href="javascript:;" class="btn btn-primary">{{ __('Jump to Tutorials') }} <i class="icon ion-ios-arrow-forward"></i></a>
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <a href="javascript:;" class="btn btn-primary">{{ __('See all Packages') }} <i class="icon ion-ios-arrow-forward"></i></a>
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
                    <form action="#">
                        <input type="email" class="form-control" placeholder="What is your email address ?">
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
                <a href="javascript:;" class="block__link">{{ __('View all') }}</a>
            </header>
            <div class="row">
                @for($i = 1; $i <= 3; $i++)
                <div class="col-12 col-md-4">
                    <div class="event">
                        <div class="event__thumb">
                            <img src="{{ asset('img/laracon.png') }}" alt="lara event">
                            <span class="event__price">{{ __('Free') }}</span>
                            <p class="event__share">
                                <a href="javascript:;">{{ __('Share') }} <i class="fa fa-share-alt"></i></a>
                            </p>
                        </div>
                        <div class="event__content">
                            <span class="event__content-date">Vendredi, 12 Juin à 18h - Akwa Douala</span>
                            <h6 class="event__content-title">
                                <a href="javascript:;">Google I/O Extended 2018 - GDG Douala</a>
                            </h6>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

@endsection
