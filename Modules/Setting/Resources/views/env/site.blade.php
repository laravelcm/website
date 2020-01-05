<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.site.app_name'))
                ->for('app_name')
                ->class('col-form-label')
             }}
            {{ html()->text('app_name')
                ->class('form-control kt_maxlength')
                ->attribute('maxlength', 191)
                ->value(env('APP_NAME'))
            }}
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        {{ html()->label(__('setting::labels.backend.env.site.app_url'))
            ->for('app_url')
            ->class('col-form-label')
         }}
        {{ html()->text('app_url')
            ->class('form-control kt_maxlength')
            ->attribute('maxlength', 191)
            ->value(env('APP_URL'))
        }}
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ html()->label(__('setting::labels.backend.env.site.dashboard_prefix'))
                ->for('dashboard_prefix')
                ->class('col-form-label')
             }}
            {{ html()->text('dashboard_prefix')
                ->class('form-control kt_maxlength')
                ->attribute('maxlength', 15)
                ->value(env('DASHBOARD_PREFIX'))
            }}
        </div>
    </div>
</div>
