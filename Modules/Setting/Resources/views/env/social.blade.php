<div class="form-group form-group-last">
    <div class="alert alert-secondary" role="alert">
        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
        <div class="alert-text">
            @lang('setting::string.backend.env.social')
        </div>
    </div>
</div>

<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Facebook
            </div>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('Active'))
                                ->for('facebook_active')
                                ->class('col-form-label')
                             }}
                            <div>
                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                                    <label class="kt-mb-0">
                                        {{ html()->checkbox('facebook_active')
                                            ->checked(env('FACEBOOK_ACTIVE') === true)
                                        }}
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_id', ['provider' => 'Facebook']))
                                ->for('facebook_client_id')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('facebook_client_id')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('FACEBOOK_CLIENT_ID'))
                                ->id('facebook_client_id')
                            }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_secret', ['provider' => 'Facebook']))
                                ->for('facebook_client_secret')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('facebook_client_secret')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('FACEBOOK_CLIENT_SECRET'))
                                ->id('facebook_client_secret')
                            }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.redirect', ['provider' => 'Facebook']))
                                ->for('facebook_redirect')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('facebook_redirect')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('FACEBOOK_REDIRECT'))
                                ->id('facebook_redirect')
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Twitter
            </div>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('Active'))
                                ->for('twitter_active')
                                ->class('col-form-label')
                             }}
                            <div>
                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                                    <label class="kt-mb-0">
                                        {{ html()->checkbox('twitter_active')
                                            ->checked(env('TWITTER_ACTIVE') === true)
                                        }}
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_id', ['provider' => 'Twitter']))
                                ->for('twitter_client_id')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('twitter_client_id')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('TWITTER_CLIENT_ID'))
                                ->id('twitter_client_id')
                            }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_secret', ['provider' => 'Twitter']))
                                ->for('twitter_client_secret')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('twitter_client_secret')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('TWITTER_CLIENT_SECRET'))
                                ->id('twitter_client_secret')
                            }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.redirect', ['provider' => 'Twitter']))
                                ->for('twitter_redirect')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('twitter_redirect')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('TWITTER_REDIRECT'))
                                ->id('twitter_redirect')
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Google
            </div>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('Active'))
                                ->for('google_active')
                                ->class('col-form-label')
                             }}
                            <div>
                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                                    <label class="kt-mb-0">
                                        {{ html()->checkbox('google_active')
                                            ->checked(env('GOOGLE_ACTIVE') === true)
                                        }}
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_id', ['provider' => 'Google']))
                                ->for('google_client_id')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('google_client_id')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('GOOGLE_CLIENT_ID'))
                                ->id('google_client_id')
                            }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_secret', ['provider' => 'Google']))
                                ->for('google_client_secret')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('google_client_secret')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('GOOGLE_CLIENT_SECRET'))
                                ->id('google_client_secret')
                            }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.redirect', ['provider' => 'Google']))
                                ->for('google_redirect')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('google_redirect')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('GOOGLE_REDIRECT'))
                                ->id('google_redirect')
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFour">
            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                LinkedIn
            </div>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('Active'))
                                ->for('linkedin_active')
                                ->class('col-form-label')
                             }}
                            <div>
                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                                    <label class="kt-mb-0">
                                        {{ html()->checkbox('linkedin_active')
                                            ->checked(env('LINKEDIN_ACTIVE') === true)
                                        }}
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_id', ['provider' => 'LinkedIn']))
                                ->for('linkedin_client_id')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('linkedin_client_id')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('LINKEDIN_CLIENT_ID'))
                                ->id('linkedin_client_id')
                            }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_secret', ['provider' => 'LinkedIn']))
                                ->for('linkedin_client_secret')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('linkedin_client_secret')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('LINKEDIN_CLIENT_SECRET'))
                                ->id('linkedin_client_secret')
                            }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.redirect', ['provider' => 'LinkedIn']))
                                ->for('linkedin_redirect')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('linkedin_redirect')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('LINKEDIN_REDIRECT'))
                                ->id('linkedin_redirect')
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFive">
            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Github
            </div>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('Active'))
                                ->for('github_active')
                                ->class('col-form-label')
                             }}
                            <div>
                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                                    <label class="kt-mb-0">
                                        {{ html()->checkbox('github_active')
                                            ->checked(env('GITHUB_ACTIVE') === true)
                                        }}
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_id', ['provider' => 'Github']))
                                ->for('github_client_id')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('github_client_id')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('GITHUB_CLIENT_ID'))
                                ->id('github_client_id')
                            }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_secret', ['provider' => 'Github']))
                                ->for('github_client_secret')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('github_client_secret')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('GITHUB_CLIENT_SECRET'))
                                ->id('github_client_secret')
                            }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.redirect', ['provider' => 'Github']))
                                ->for('github_redirect')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('github_redirect')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('GITHUB_REDIRECT'))
                                ->id('github_redirect')
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSix">
            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Bitbucket
            </div>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('Active'))
                                ->for('bitbucket_active')
                                ->class('col-form-label')
                             }}
                            <div>
                                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
                                    <label class="kt-mb-0">
                                        {{ html()->checkbox('bitbucket_active')
                                            ->checked(env('BITBUCKET_ACTIVE') === true)
                                            ->value('true')
                                        }}
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_id', ['provider' => 'Bitbucket']))
                                ->for('bitbucket_client_id')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('bitbucket_client_id')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('BITBUCKET_CLIENT_ID'))
                                ->id('bitbucket_client_id')
                            }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.client_secret', ['provider' => 'Bitbucket']))
                                ->for('bitbucket_client_secret')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('bitbucket_client_secret')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('BITBUCKET_CLIENT_SECRET'))
                                ->id('bitbucket_client_secret')
                            }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('setting::labels.backend.env.social.redirect', ['provider' => 'Bitbucket']))
                                ->for('bitbucket_redirect')
                                ->class('col-form-label')
                             }}
                            {{ html()->text('bitbucket_redirect')
                                ->class('form-control kt_maxlength')
                                ->attribute('maxlength', 191)
                                ->value(env('BITBUCKET_REDIRECT'))
                                ->id('bitbucket_redirect')
                            }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
