@if(config('locale.status') && count(config('locale.languages')) > 1)
    <!--begin:: Languages -->
    <div class="kt-header__topbar-item kt-header__topbar-item--langs">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <img src="{{ themes('public/media/flags/'.app()->getLocale().'.svg') }}" alt="local" />
            </span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
            @include('partials._topbar.dropdown.languages')
        </div>
    </div>
    <!--end:: Languages -->
@endif
