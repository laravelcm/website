@extends('core::public.master')

@section('title', $model->title.' – '.__('Events').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-events body-event-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    <div class="meetup-header">
        <div class="container">
            <div class="meetup-element">
                <link itemprop="url" href="{{ route($lang.'::event', $model->slug) }}">
                <meta itemprop="startDate" content="{{ $model->start_date->toIso8601String() }}">
                <meta itemprop="endDate" content="{{ $model->end_date->toIso8601String() }}">
                <meta itemprop="image" content="{{ $model->present()->thumbUrl() }}">
                <div class="meetup-time">
                    <time class="displayDate">
                        <span class="meetup_day">{{ $model->start_date->format('j') }}</span>
                        <span class="meetup_month">{{ $model->start_date->format('M') }}</span>
                    </time>
                </div>
                <div class="meetup-date">
                    <p class="meetup-date__date">{!! $model->present()->dateFromTo !!}</p>
                    <h1 class="meetup-title" itemprop="name">{{ $model->title }}</h1>
                    <div class="meetup-organizer">
                        <div class="meetup-organizer__avatar">
                            <img src="{{ asset('img/organizers/arthur.png') }}" alt="Arthur Monney">
                        </div>
                        <div class="meetup-organizer__info">
                            <p class="meetup-organizer__name">@lang('db.Hosted by') <a href="https://github.com/mckenziearts" target="_blank">Arthur Monney</a></p>
                            <p class="meetup-name">@lang('db.From') <a href="https://laravelcm.com">{{ $websiteTitle }}</a></p>
                            <p class="meetup-community">@lang('db.PHP & Laravel Community')</p>
                        </div>
                    </div>
                </div>
                <div class="meetup-register">
                    <p class="meetup-people"><strong>@lang('db.Are you going')?</strong> @lang('db.many people going')</p>
                    <p class="meetup-share">
                        {{ __('Share') }}:
                        <a href="javascript:;" data-url="{{ URL::full() }}" class="share_twitter"><i class="fa fa-twitter"></i></a>
                        <a href="javascript:;" data-url="{{ URL::full() }}" class="share_facebook"><i class="fa fa-facebook-square"></i></a>
                        <a href="javascript:;" data-url="{{ URL::full() }}" class="share_linkedin"><i class="fa fa-linkedin-square"></i></a>
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
                            {!! $model->present()->dateFromTo !!} <br>{!! $model->present()->timeFromTo !!} <br>
                            <a href="{{ route($lang.'::event-ics', $model->slug) }}" target="_blank">
                                @lang('db.Add to calendar')
                            </a>
                        </div>
                    </div>
                    <div class="location-place">
                        <span><i class="icon ion-ios-location-outline"></i></span>
                        <div>
                            <strong>{{ $model->venue }}</strong> <br> {!! nl2br($model->address) !!}
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
            <div class="meetup-content" itemscope itemtype="http://schema.org/Event">
                {!! $model->present()->thumb() !!}

                {!! $model->present()->body !!}
            </div>
        </section>

    </div>

    @include('pages::public.partials.sponsors')

@endsection
