<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.locale.app_locale'))
                ->for('app_locale')
                ->class('col-form-label')
             }}
            {{ html()->select('app_locale', config('locale.locale'), env('APP_LOCALE'))
                ->class('form-control kt_selectpicker')
            }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.locale.app_fallback_locale'))
                ->for('app_fallback_locale')
                ->class('col-form-label')
             }}
            {{ html()->select('app_fallback_locale', config('locale.locale'), env('APP_FALLBACK_LOCALE'))
                ->class('form-control kt_selectpicker')
            }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.locale.app_locale_php'))
                ->for('app_locale_php')
                ->class('col-form-label')
             }}
            {{ html()->text('app_locale_php')
                ->class('form-control kt_maxlength')
                ->attribute('maxlength', 10)
                ->value(env('APP_LOCALE_PHP'))
            }}
        </div>
    </div>
    <div class="col-md-6">

    </div>
</div>
