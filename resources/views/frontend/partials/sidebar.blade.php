<aside class="sidebar">

    @if($hide === false)
        <div class="card sidebar_card">
            <h5>
                <span class="fa fa-pencil-square-o"></span>
                {{ $name }} ({{ $value }})
            </h5>
        </div>
    @endif

    <div class="card facebook">
        <h5>{{ __('Facebook Page') }}</h5>
	    <div class="facebook__page">
            <div class="fb-page" data-href="https://www.facebook.com/laravelcm/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/laravelcm/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/laravelcm/">Laravel Cameroun</a>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="card twitter">
        <h5>{{ __('Last Tweets') }}</h5>
        @foreach($tweets as $tweet)
            <div class="tweet">
                <?php
                    $text = preg_replace('@([^>"])(https?://[a-z0-9\./+,%#_-]+)@i', '$1<a href="$2">$2</a>', $tweet['text']);
                ?>
                <img src="{{ $tweet['user']['profile_image_url_https'] }}" alt="Laravel cameroon twitter profile">
                <p>{!! $text !!}</p>
            </div>
        @endforeach
    </div>

</aside>

@push('scripts')
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.0&appId=636860506475165&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endpush
