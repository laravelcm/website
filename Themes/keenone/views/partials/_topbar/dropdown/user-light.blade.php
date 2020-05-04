<div class="kt-user-card-v4 kt-user-card-v4--skin-light kt-notification-item-padding-x">
	<div class="kt-user-card-v4__avatar">
		<!--use "kt-rounded" class for rounded avatar style-->
        <img alt="{{ $logged_in_user->email }}" src="{{ $logged_in_user->picture }}" class="kt-rounded-"/>

		<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
		<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">
            {{ $logged_in_user->full_name }}
        </span>
	</div>
	<div class="kt-user-card-v4__name">
        {{ $logged_in_user->full_name }}
		<small>{{ $logged_in_user->roles_label }}</small>
	</div>
</div>
<ul class="kt-nav kt-margin-b-10">
    <li class="kt-nav__item">
        <a href="{{ route('frontend.index') }}" class="kt-nav__link" target="_blank">
            <span class="kt-nav__link-icon"><i class="flaticon-browser"></i></span>
            <span class="kt-nav__link-text">Afficher le site</span>
        </a>
    </li>
	<li class="kt-nav__item">
		<a href="{{ route('admin.auth.profile.index', 'profile') }}" class="kt-nav__link">
			<span class="kt-nav__link-icon"><i class="flaticon2-schedule"></i></span>
			<span class="kt-nav__link-text">Mon Profil</span>
		</a>
	</li>
	<li class="kt-nav__separator kt-nav__separator--fit"></li>
	<li class="kt-nav__custom kt-space-between">
        <a href="{{ route('frontend.auth.logout') }}" class="btn btn-label-brand btn-upper btn-sm btn-bold">@lang('navs.general.logout')</a>
	</li>
</ul>
