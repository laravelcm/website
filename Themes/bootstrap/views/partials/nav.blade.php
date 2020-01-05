<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <div class="d-flex align-items-center header">
            @include('includes.logo')
            <h5 class="mb-0 ml-3">
                <a href="{{ route('frontend.index') }}" class="navbar-brand">UgoCarpool</a>
            </h5>
        </div>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                @if(config('locale.status') && count(config('locale.languages')) > 1)
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})
                        </a>

                        @include('partials.lang')
                    </li>
                @endif

                @auth
                    <li class="nav-item">
                        <a href="{{ route('frontend.user.dashboard') }}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}">
                            @lang('navs.frontend.dashboard')
                        </a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a href="{{ route('frontend.auth.login') }}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">
                            @lang('navs.frontend.login')
                        </a>
                    </li>

                    @if(config('project.registration'))
                        <li class="nav-item">
                            <a href="{{ route('frontend.auth.register') }}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">
                                @lang('navs.frontend.register')
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $logged_in_user->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                            @can('view backend')
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                    @lang('navs.frontend.user.administration')
                                </a>
                            @endcan

                            <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">
                                @lang('navs.frontend.user.account')
                            </a>
                            <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
