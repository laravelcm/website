<div class="form-group form-group-last">
    <div class="alert alert-secondary" role="alert">
        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
        <div class="alert-text">
            @lang('setting::string.backend.env.captcha')
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.captcha.CONTACT_CAPTCHA_STATUS'))
                ->for('contact_captcha_status')
                ->class('col-form-label')
             }}
            <div>
                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                    <label class="kt-mb-0">
                        {{ html()->checkbox('contact_captcha_status')
                            ->checked(env('CONTACT_CAPTCHA_STATUS') === true)
                        }}
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.captcha.REGISTRATION_CAPTCHA_STATUS'))
                ->for('registration_captcha_status')
                ->class('col-form-label')
             }}
            <div>
                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                    <label class="kt-mb-0">
                        {{ html()->checkbox('registration_captcha_status')
                            ->checked(env('REGISTRATION_CAPTCHA_STATUS') === true)
                        }}
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.captcha.INVISIBLE_RECAPTCHA_BADGEHIDE'))
                ->for('invisible_captcha_badgehide')
                ->class('col-form-label')
             }}
            <div>
                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                    <label class="kt-mb-0">
                        {{ html()->checkbox('invisible_captcha_badgehide')
                            ->checked(env('INVISIBLE_RECAPTCHA_BADGEHIDE') === true)
                        }}
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.captcha.INVISIBLE_RECAPTCHA_DEBUG'))
                ->for('invisible_recaptcha_debug')
                ->class('col-form-label')
            }}
            <div>
                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                    <label class="kt-mb-0">
                        {{ html()->checkbox('invisible_recaptcha_debug')
                            ->checked(env('INVISIBLE_RECAPTCHA_DEBUG') === true)
                        }}
                        <span></span>
                    </label>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.captcha.INVISIBLE_RECAPTCHA_SITEKEY'))
                ->for('invisible_recaptcha_sitekey')
                ->class('col-form-label')
             }}
            {{ html()->text('invisible_recaptcha_sitekey')
                ->class('form-control kt_maxlength')
                ->attribute('maxlength', 15)
                ->value(env('INVISIBLE_RECAPTCHA_SITEKEY'))
            }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.captcha.INVISIBLE_RECAPTCHA_SECRETKEY'))
                ->for('invisible_recaptcha_secretkey')
                ->class('col-form-label')
             }}
            {{ html()->text('invisible_recaptcha_secretkey')
                ->class('form-control kt_maxlength')
                ->attribute('maxlength', 15)
                ->value(env('INVISIBLE_RECAPTCHA_SECRETKEY'))
            }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.captcha.INVISIBLE_RECAPTCHA_TIMEOUT'))
                ->for('invisible_recaptcha_timeout')
                ->class('col-form-label')
             }}
            {{ html()->number('invisible_recaptcha_timeout')
                ->class('form-control')
                ->value(env('INVISIBLE_RECAPTCHA_TIMEOUT'))
            }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.captcha.INVISIBLE_RECAPTCHA_DATABADGE'))
                ->for('invisible_recaptcha_databadge')
                ->class('col-form-label')
             }}
            {{ html()->text('invisible_recaptcha_databadge')
                ->class('form-control kt_maxlength')
                ->attribute('maxlength', 191)
                ->value(env('INVISIBLE_RECAPTCHA_DATABADGE'))
            }}
        </div>
    </div>
</div>
