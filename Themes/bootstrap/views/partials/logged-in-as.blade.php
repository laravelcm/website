@if(auth()->user() && session()->has("admin_user_id") && session()->has("temp_user_id"))
    <div class="impersonate-bar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <p>@lang('strings.frontend.logged') {{ auth()->user()->name }}.</p>
                <a href="{{ route("frontend.auth.logout-as") }}">
                    <i class="flaticon2-user-1"></i>
                    @lang('strings.frontend.relogged') {{ session()->get("admin_user_name") }}
                </a>
            </div>
        </div>
    </div>
@endif
