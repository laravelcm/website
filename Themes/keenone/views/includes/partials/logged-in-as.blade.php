<div class="kt-container kt-comtainer--fluid">
    @if(auth()->user() && session()->has("admin_user_id") && session()->has("temp_user_id"))
        <div class="alert alert-solid-warning alert-bold" role="alert">
            <div class="alert-text">
                @lang('strings.frontend.logged') {{ auth()->user()->name }}. <a href="{{ route("frontend.auth.logout-as") }}">@lang('strings.frontend.relogged') {{ session()->get("admin_user_name") }}</a>.
            </div><!--alert alert-warning logged-in-as-->
        </div>
    @endif
</div>
