<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    @lang('user::menus.backend.access.profile.personal')
                    <small>@lang('user::string.backend.users.profile.personal')</small>
                </h3>
            </div>
        </div>
        {{ html()->modelForm($logged_in_user, 'POST', route('admin.auth.profile.update'))->class('kt-form kt-form--label-right')->attribute('enctype', 'multipart/form-data')->open() }}
            @method('PATCH')
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                    <div class="kt-section__body">
                        <div class="row">
                            <label class="col-xl-3">

                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <h3 class="kt-section__title kt-section__title-sm">@lang('user::string.backend.users.profile.info'):</h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-avatar kt-avatar--circle" id="kt_profile_avatar_1">
                                    <div class="kt-avatar__holder" style="background-image: url('{{ $logged_in_user->picture }}');"></div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="@lang('user::string.backend.users.profile.change_avatar')">
                                        <i class="fa fa-pen"></i>
                                        {{ html()->file('avatar_location')->accept('.png, .jpg, .jpeg') }}
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="@lang('user::string.backend.users.profile.cancel_avatar')">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                                <input type="hidden" name="avatar_type" value="storage" />
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.frontend.first_name'))
                                ->for('first_name')
                                ->class('col-xl-3 col-lg-3 col-form-label')
                             }}
                            <div class="col-lg-9 col-xl-6">
                                {{ html()->text('first_name')
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.frontend.last_name'))
                                ->for('last_name')
                                ->class('col-xl-3 col-lg-3 col-form-label')
                            }}
                            <div class="col-lg-9 col-xl-6">
                                {{ html()->text('last_name')
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                 }}
                            </div>
                        </div>
                        @if ($logged_in_user->canChangeEmail())
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="alert alert-solid-info alert-bold fade show kt-margin-b-40" role="alert">
                                        <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                        <div class="alert-text">
                                            @lang('strings.frontend.user.change_email_notice')
                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="la la-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <h3 class="kt-section__title kt-section__title-sm">Contact Info:</h3>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::labels.backend.access.users.table.email')</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="la la-at"></i></span>
                                        </div>
                                        {{ html()->email('email')
                                            ->class('form-control')
                                            ->attribute('maxlength', 191)
                                            ->required()
                                         }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-3 col-xl-3"></div>
                        <div class="col-lg-9 col-xl-9">
                            <button type="submit" class="btn btn-brand btn-bold">
                                @lang('user::string.backend.users.profile.buttons.update')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        {{ html()->closeModelForm() }}
    </div>
</div>

@push('after-scripts')

    <script src="{{ themes('dist/js/pages/components/forms/controls/avatar.js') }}"></script>

@endpush
