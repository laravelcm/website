@if ($navbar)
    <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="fa fa-bars fa-fw fa-inverse"></span>
        </button>
        <a class="navbar-brand" href="{{ route('dashboard') }}">{{ Illuminate\Support\Str::limit(TypiCMS::title(config('typicms.admin_locale')), 50, '…') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#userMenu" aria-controls="userMenu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="fa fa-chevron-down fa-fw fa-inverse"></span>
        </button>
        <div class="collapse navbar-collapse" id="userMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @section('otherSideLink')
                        @if (Request::segment(1) == 'admin')
                            @include('core::admin._navbar-public-link')
                        @else
                            @include('core::public._navbar-admin-link')
                        @endif
                    @show
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->first_name.' '.auth()->user()->last_name }}</a>
                    <div class="dropdown-menu dropdown-user">
                        <div class="dropdown-user-wrapper">
                            <div class="img">
                                <img src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?d=mm" class="pull-left">
                            </div>
                            <div class="info">
                                <p>{{ auth()->user()->email }}</p>
                                @can ('update-user')
                                <p>
                                    <a href="{{ route('admin::edit-user', Auth::id()) }}">{{ __('Profile', [], config('typicms.admin_locale')) }}</a>
                                </p>
                                @endcan
                                <p>
                                    <form action="{{ route('logout') }}" method="post">
                                        {{ csrf_field() }}
                                        <button class="btn btn-secondary btn-sm" type="submit">@lang('Log out', [], config('typicms.admin_locale'))</button>
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                @can ('see-settings')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin::index-settings') }}"><span class="fa fa-cog fa-fw"></span> <span class="hidden-sm">{{ __('Settings', [], config('typicms.admin_locale')) }}</span></a>
                    </li>
                @endcan
            </ul>
        </div>
    </nav>
@endif
