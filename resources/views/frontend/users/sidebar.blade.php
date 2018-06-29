<div class="card account_setting">
    <h3 class="setting_title">{{ __('Settings') }}</h3>
    <ul class="settings">
        <li class="setting"><a href="{{ route('users.account') }}">{{ __('Edit Profile') }}</a></li>
        <li class="setting"><a href="{{ route('users.password') }}">{{ __('Update password') }}</a></li>
        <li class="setting"><a href="javascript:;">{{ __('Forum settings') }}</a></li>
    </ul>
</div>
