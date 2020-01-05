<div class="kt-subheader__wrapper">
    <div class="dropdown dropdown-inline" data-toggle="kt-tooltip-" title="Quick actions" data-placement="left">
        <a href="#" class="btn btn-label-brand btn-icon"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="flaticon-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">
            <!--begin::Nav-->
            <ul class="kt-nav">
                <li class="kt-nav__head">
                    @lang('user::menus.backend.access.users.main')
                </li>
                <li class="kt-nav__separator"></li>
                <li class="kt-nav__item">
                    <a href="{{ route('admin.auth.user.index') }}" class="kt-nav__link">
                        <i class="kt-nav__link-icon flaticon-users"></i>
                        <span class="kt-nav__link-text">@lang('user::menus.backend.access.users.all')</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="{{ route('admin.auth.user.deactivated') }}" class="kt-nav__link">
                        <i class="kt-nav__link-icon flaticon-warning"></i>
                        <span class="kt-nav__link-text">@lang('user::menus.backend.access.users.deactivated')</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="{{ route('admin.auth.user.deleted') }}" class="kt-nav__link">
                        <i class="kt-nav__link-icon flaticon2-trash"></i>
                        <span class="kt-nav__link-text">@lang('user::menus.backend.access.users.deleted')</span>
                    </a>
                </li>
            </ul>
            <!--end::Nav-->
        </div>
    </div>
</div>
