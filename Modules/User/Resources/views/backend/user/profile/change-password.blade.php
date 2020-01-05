<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    @lang('user::menus.backend.access.profile.password')
                    <small>@lang('user::string.backend.users.profile.password')</small>
                </h3>
            </div>
        </div>
        {{ html()->form('PATCH', route('admin.auth.profile.password.update'))->class('kt-form kt-form--label-right')->id('kt_profile_form')->open() }}
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                    <div class="kt-section__body">
                        <div class="alert alert-solid-danger alert-bold fade show kt-margin-b-40" role="alert">
                            <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                            <div class="alert-text">
                                @lang('user::string.backend.users.profile.password_text')
                            </div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ html()
                                ->label(__('validation.attributes.frontend.old_password'))
                                ->for('old_password')
                                ->class('col-lg-3 col-form-label')
                            }}
                            <div class="col-lg-6">
                                {{ html()->password('old_password')
                                    ->class('form-control')
                                    ->autofocus()
                                    ->required()
                                }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ html()
                                ->label(__('validation.attributes.frontend.new_password'))
                                ->for('old_password')
                                ->class('col-lg-3 col-form-label')
                            }}
                            <div class="col-lg-6">
                                {{ html()->password('password')
                                    ->class('form-control')
                                    ->required()
                                 }}
                            </div>
                        </div>
                        <div class="form-group form-group-last row">
                            {{ html()
                                ->label(__('validation.attributes.frontend.new_password_confirmation'))
                                ->for('old_password')
                                ->class('col-lg-3 col-form-label')
                            }}
                            <div class="col-lg-6">
                                {{ html()->password('password_confirmation')
                                    ->class('form-control')
                                    ->required()
                                }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-3 col-xl-3"></div>
                        <div class="col-lg-9 col-xl-9">
                            <button type="submit" class="btn btn-brand btn-bold">@lang('labels.frontend.passwords.update_password_button')</button>
                        </div>
                    </div>
                </div>
            </div>
        {{ html()->form()->close() }}
    </div>
</div>
