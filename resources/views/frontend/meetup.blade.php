@extends('layouts.app')
@section('title', __('Laravel Cameroun Meetup 2018'))

@section('meta')
    <meta name="description" content="{{ __('Laravel Cameroon is the biggest PHP & Laravel community and meetup event in Cameroon that brings together the best Laravel and PHP developers in Cameroon.') }}">
    <!-- Facebook Meta -->
    <meta property="og:url" content="{{ route('meetup') }}">
    <meta property="og:title" content="{{ __('Laravel Cameroon Meetup 2018') }}">
    <meta property="og:image" content="{{ asset('img/meetup-1254052.jpg') }}">
    <meta property="og:description" content="{{ __('Laravel Cameroon is the biggest PHP & Laravel community and meetup event in Cameroon that brings together the best Laravel and PHP developers in Cameroon.') }}">
    <!-- Twitter Meta -->
    <meta name="twitter:url" content="{{ route('meetup') }}">
    <meta name="twitter:title" content="{{ __('Laravel Cameroon Meetup 2018') }}">
    <meta name="twitter:description" content="{{ __('Laravel Cameroon is the biggest PHP & Laravel community and meetup event in Cameroon that brings together the best Laravel and PHP developers in Cameroon.') }}">
    <meta name="twitter:image" content="{{ asset('img/meetup-1254052.jpg') }}">
@endsection

@section('content')

    <div class="meetup-header">
        <div class="container">
            <div class="meetup-element">
                <div class="meetup-time">
                    <time class="displayDate">
                        <span class="meetup_day">25</span>
                        <span class="meetup_month">{{ __('Aug') }}</span>
                    </time>
                </div>
                <div class="meetup-date">
                    <p class="meetup-date__date">{{ __('Saturday, August 25, 2018') }}</p>
                    <h1 class="meetup-title">{{ __('Laravel Cameroon Meetup 2018') }}</h1>
                    <div class="meetup-organizer">
                        <div class="meetup-organizer__avatar">
                            <img src="{{ asset('img/organizers/fabrice.png') }}" alt="Fabrice Yopa">
                        </div>
                        <div class="meetup-organizer__info">
                            <p class="meetup-organizer__name">{{ __('Hosted by') }} <a href="https://github.com/fabriceyopa" target="_blank">Fabrice Yopa</a></p>
                            <p class="meetup-name">{{ __('From') }} <a href="https://laravelcm.com">{{ __('Laravel Cameroon') }}</a></p>
                            <p class="meetup-community">{{ __('PHP & Laravel Community') }}</p>
                        </div>
                    </div>
                </div>
                <div class="meetup-register">
                    <p class="meetup-people"><strong>{{ __('Are you going') }}?</strong> 150 {{ __('people going') }}</p>
                    <a href="https://www.eventbrite.fr/e/billets-laravel-cameroon-meetup-48591234691?aff=ehomecard" class="btn btn-primary" target="_blank">
                        {{ __('Register now') }} <i class="icon ion-ios-arrow-thin-right"></i>
                    </a>
                    <br>
                    <small>{{ __('Free tickets') }}</small>
                    <p class="meetup-share">
                        {{ __('Share') }}:
                        <a href="javascript:;" data-url="{{ route('meetup') }}" class="share_twitter"><i class="fa fa-twitter"></i></a>
                        <a href="javascript:;" data-url="{{ route('meetup') }}" class="share_facebook"><i class="fa fa-facebook-square"></i></a>
                        <a href="javascript:;" data-url="{{ route('meetup') }}" class="share_linkedin"><i class="fa fa-linkedin-square"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <section class="meetup">
            <div class="meetup-flex-location">
                <div class="meetup-location">
                    <div class="location-time">
                        <span><i class="icon ion-ios-clock-outline"></i></span>
                        <div>
                            {{  __('Saturday, August 25, 2018') }} <br> {{ __('9:00 AM to 4:00 PM') }} <br>
                            <a href="https://calendar.google.com/calendar/r?pli=1" target="_blank">{{ __('Add to calendar') }}</a>
                        </div>
                    </div>
                    <div class="location-place">
                        <span><i class="icon ion-ios-location-outline"></i></span>
                        <div>
                            <strong>ActivSpace</strong> <br> Boulevard de la liberté, Douala <br>
                            Région du littoral
                        </div>
                    </div>
                </div>
                <div class="location--map">
                    <div id="map"></div>
                    <script>
                        function initMap() {
                            var activSpace = {lat: 4.0542329, lng: 9.6962057}
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 17,
                                center: activSpace,
                            })
                            var marker = new google.maps.Marker({
                                position: activSpace,
                                map: map,
                                title: 'ActivSpaces'
                            })
                            marker.setMap(map)
                        }
                    </script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1GAOdaHfo83h1sfrjI9ORRZXvT4_kC0w&callback=initMap"></script>
                </div>
            </div>
            <div class="meetup-content">
                <img src="{{ asset('img/meetup-1254052.jpg') }}" alt="image cover">

                <h3 class="meetup-detail__title">{{ __('Details') }}</h3>

                <p>{{ __('Laravel Cameroon Meetup: the first meetup entirely dedicated to the PHP language and the Laravel framework in Cameroon') }}</p>
                <p>{{ __('After a lot of waiting with the arrival of the long awaited 5.x version of Laravel, the first Cameroonian meetup entirely dedicated to Laravel is coming!') }}</p>
                <p>{{ __('The meetup will be based on the presentation of the PHP and Laravel community in Cameroon, a presentation of the organizers of the meetup and why use Laravel in business') }}</p>

                <ul>
                    <li>{{ __('Laravel Overview') }}</li>
                    <li>{{ __('Optimizations and performances') }}</li>
                    <li>{{ __('Development tools') }}</li>
                    <li>{{ __('Best practices, methodologies and tests') }}</li>
                    <li>{{ __('Laravel Packages') }}</li>
                    <li>{{ __('and all that revolves around the world of Laravel') }}</li>
                </ul>

                {{--<h3 class="meetup-attendees__header">{{ __('Attendees') }} (150)</h3>

                <div class="attendees">
                    <div class="attendee">
                        <img src="{{ asset('img/organizers/arthur.png') }}" alt="Arthur Monney">
                        <a href="https://github.com/mckenziearts" target="_blank">Arthur Monney</a>
                        <p class="attendee__post">Co-organizer</p>
                    </div>
                    @foreach ($participants as $participant)
                        <div class="attendee">
                            <img src="https://www.gravatar.com/avatar/"{{ md5(strtolower(trim($participant['email']))) }}&s="110" alt="participant">
                            <a href="javascript:;" target="_blank">{{ $participant['name'] }}</a>
                            <p class="attendee__post">Participant</p>
                        </div>
                    @endforeach
                </div>--}}
            </div>
        </section>

        <section class="schedule">
            <h3 class="schedule-title">{{ __('Schedule') }}</h3>
            <div class="schedule__break">
                <time>09:00 - 09:30</time>
                <h6>{{ __('Registration') }}</h6>
            </div>
            <div class="schedule__timeslots">
                <time>09:30</time>
            </div>
            <div class="schedule__workshop grid-5">
                <div class="schedule__session red-badge">
                    <h6 class="session-talk">{{ __('Talk') }}</h6>
                    <h4>{{ __('Introduction of the community') }}</h4>
                    <a href="https://twitter.com/Tekyid237" target="_blank">Idriss Tekeudo</a>
                </div>
                <div class="schedule__session blue-badge">
                    <h6 class="session-workshop">{{ __('Workshop') }}</h6>
                    <h4>{{ __("Laravel Guide Tour") }}</h4>
                </div>
                <div class="schedule__session green-badge">
                    <h6 class="session-workshop">{{ __('Workshop') }}</h6>
                    <h4>{{ __("Laravel: What do i think") }}</h4>
                    <a href="https://twitter.com/MonneyArthur" target="_blank">Arthur Monney</a>
                </div>
            </div>
            <div class="schedule__break">
                <time>11:00 - 11:10</time>
                <h6>{{ __('Break #1') }} (10 min)</h6>
            </div>
            <div class="schedule__timeslots">
                <time>11:10</time>
            </div>
            <div class="schedule__workshop grid-5">
                <div class="schedule__session red-badge">
                    <h6 class="session-talk">{{ __('Talk') }}</h6>
                    <h4>{{ __("Sponsors's words") }}</h4>
                    <a href="https://kerawa.com" target="_blank">Kerawa Cameroun</a>
                </div>
                <div class="schedule__session blue-badge">
                    <h6 class="session-workshop">{{ __('Workshop') }}</h6>
                    <h4>{{ __("Laravel ecosystem") }}</h4>
                    <a href="https://twitter.com/yopafabrice" target="_blank">Fabrice Yopa</a>
                </div>
                <div class="schedule__session green-badge">
                    <h6 class="session-workshop">{{ __('Workshop') }}</h6>
                    <h4>{{ __("Getting started") }}</h4>
                </div>
                <div class="schedule__session pink-badge">
                    <h6 class="session-talk">{{ __('Talk') }}</h6>
                    <h4>{{ __("Sponsors's words") }}</h4>
                    <a href="https://www.diool.com" target="_blank">Diool Labs</a>
                </div>
            </div>
            <div class="schedule__break">
                <time>12:00 - 12:15</time>
                <h6>{{ __('Break #2') }} (15 min)</h6>
            </div>
            <div class="schedule__timeslots">
                <time>12:15</time>
            </div>
            <div class="schedule__workshop grid-5">
                <div class="schedule__session red-badge">
                    <h6 class="session-talk">{{ __('Talk') }}</h6>
                    <h4>{{ __("Sponsors's words") }}</h4>
                    <a href="https://www.johns-corporation.com" target="_blank">John's Corporation</a>
                </div>
                <div class="schedule__session blue-badge">
                    <h6 class="session-workshop">{{ __('Workshop') }}</h6>
                    <h4>{{ __("Laravel Introduction with Docker") }}</h4>
                    <div class="metadata">
                        <span class="end-time">{{ __('Ends') }} <time>14:00</time></span>
                    </div>
                </div>
            </div>
        </section>

    </div>

    @include('frontend.partials.sponsors')

@endsection
