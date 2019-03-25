<input type="hidden" name="permissions[]" value="change-locale">
<input type="hidden" name="permissions[]" value="update-preferences">
<input type="hidden" name="permissions[]" value="clear-cache">

<div class="form-group">
    <div class="form-check">
        {!! Form::checkbox('permissions[]', 'see-navbar')->id('permission-see-navbar')->addClass('form-check-input') !!}
        <label class="form-check-label" for="permission-see-navbar">@lang('See navbar')</label>
    </div>
    <div class="form-check">
        {!! Form::checkbox('permissions[]', 'see-dashboard')->id('permission-see-dashboard')->addClass('form-check-input') !!}
        <label class="form-check-label" for="permission-see-dashboard">@lang('Access dashboard')</label>
    </div>
    <div class="form-check">
        {!! Form::checkbox('permissions[]', 'see-settings')->id('permission-see-settings')->addClass('form-check-input') !!}
        <label class="form-check-label" for="permission-see-settings">@lang('See settings')</label>
    </div>
    <div class="form-check">
        {!! Form::checkbox('permissions[]', 'update-setting')->id('permission-update-setting')->addClass('form-check-input') !!}
        <label class="form-check-label" for="permission-update-setting">@lang('Change settings')</label>
    </div>
    <div class="form-check">
        {!! Form::checkbox('permissions[]', 'see-history')->id('permission-see-history')->addClass('form-check-input') !!}
        <label class="form-check-label" for="permission-see-history">@lang('See history')</label>
    </div>
    <div class="form-check">
        {!! Form::checkbox('permissions[]', 'clear-history')->id('permission-clear-history')->addClass('form-check-input') !!}
        <label class="form-check-label" for="permission-clear-history">@lang('Empty history')</label>
    </div>
</div>

<div class="permissions-modules">
    <h2 class="permissions-modules-title">{{ __('Modules') }}</h2>
    <div class="permissions-modules-items">
        @foreach (TypiCMS::permissions() as $module => $permissions)
        <div class="permissions-modules-item mt-4 mb-4">
            <label class="permissions-modules-item-title">{{ $module }}</label>
            @foreach ($permissions as $permission => $label)
            <div class="permissions-modules-item-checkbox checkbox">
                <div class="form-check">
                    {!! Form::checkbox('permissions[]', $permission)->id('permission-'.$permission)->addClass('form-check-input') !!}
                    <label class="form-check-label" for="permission-{{ $permission }}">{{ __($label) }}</label>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
