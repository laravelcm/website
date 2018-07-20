<nav id="slide-menu" class="slide_menu">
    <div class="brand">
        <a href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="84.1" height="57.6" viewBox="0 0 84.1 57.6">
                <path fill="#fff" d="M83.8 26.9c-.6-.6-8.3-10.3-9.6-11.9-1.4-1.6-2-1.3-2.9-1.2s-10.6 1.8-11.7 1.9c-1.1.2-1.8.6-1.1 1.6.6.9 7 9.9 8.4 12l-25.5 6.1L21.2 1.5c-.8-1.2-1-1.6-2.8-1.5C16.6.1 2.5 1.3 1.5 1.3c-1 .1-2.1.5-1.1 2.9S17.4 41 17.8 42c.4 1 1.6 2.6 4.3 2 2.8-.7 12.4-3.2 17.7-4.6 2.8 5 8.4 15.2 9.5 16.7 1.4 2 2.4 1.6 4.5 1 1.7-.5 26.2-9.3 27.3-9.8 1.1-.5 1.8-.8 1-1.9-.6-.8-7-9.5-10.4-14 2.3-.6 10.6-2.8 11.5-3.1 1-.3 1.2-.8.6-1.4zm-46.3 9.5c-.3.1-14.6 3.5-15.3 3.7-.8.2-.8.1-.8-.2-.2-.3-17-35.1-17.3-35.5-.2-.4-.2-.8 0-.8S17.6 2.4 18 2.4c.5 0 .4.1.6.4 0 0 18.7 32.3 19 32.8.4.5.2.7-.1.8zm40.2 7.5c.2.4.5.6-.3.8-.7.3-24.1 8.2-24.6 8.4-.5.2-.8.3-1.4-.6s-8.2-14-8.2-14L68.1 32c.6-.2.8-.3 1.2.3.4.7 8.2 11.3 8.4 11.6zm1.6-17.6c-.6.1-9.7 2.4-9.7 2.4l-7.5-10.2c-.2-.3-.4-.6.1-.7.5-.1 9-1.6 9.4-1.7.4-.1.7-.2 1.2.5.5.6 6.9 8.8 7.2 9.1.3.3-.1.5-.7.6z"></path>
            </svg>
        </a>
    </div>
    <div class="slide-nav__search">
        <form action="{{ route('search') }}" class="search">
            <input type="text" placeholder="Search" name="q">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <ul class="slide-main-nav">
        <li class="menu__item"><a href="{{ route('blog') }}">{{ __('Blog') }}</a></li>
        <li class="menu__item"><a href="{{ route('chatter.home') }}">{{ __('Forum') }}</a></li>
        <li class="menu__item"><a href="{{ route('tutorials') }}">{{ __('Tutoriels') }}</a></li>
        <li class="menu__item"><a href="{{ route('packages') }}">{{ __('Packages') }}</a></li>
        <li class="menu__item"><a href="https://laravelevents.com">{{ __('Events') }}</a></li>
        <li class="menu__item">
            @if(LaravelLocalization::getCurrentLocale() == 'en')
                <a rel="alternate" hreflang="fr" href="{{ LaravelLocalization::getLocalizedURL('fr', null, [], true) }}">
                    <i class="icon ion-android-globe"></i> Français
                </a>
            @else
                <a rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                    <i class="icon ion-android-globe"></i> English
                </a>
            @endif
        </li>
    </ul>
    <ul class="slide-nav-social">
        <li><a href="https://www.facebook.com/laravelcm" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
        <li><a href="https://twitter.com/laravelcm" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
        <li><a href="https://laravelcm.slack.com" target="_blank"><i class="fa fa-slack"></i> Slack</a></li>
    </ul>
</nav>
