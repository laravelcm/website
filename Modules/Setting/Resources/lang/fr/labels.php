<?php

return [

    'backend' => [
        'buttons' => [
            'save_env' => 'Sauvergarder les variables'
        ],
        'env' => [
            'site' => [
                'app_name' => 'Nom de l\'application',
                'app_url' => 'URL de l\'application',
                'dashboard_prefix' => 'Prefix Dashboard',
                'app_demo' => 'En Mode Demo?',
            ],
            'locale' => [
                'app_locale' => 'Langue de l\'application',
                'app_fallback_locale' => 'App Fallback Locale',
                'app_locale_php' => 'App Locale PHP',
                'app_timezone' => 'App Timezone',
            ],
            'social' => [
                'client_id' => ':provider Client ID',
                'client_secret' => ':provider Client Secret',
                'redirect' => ':provider Redirect Url',
            ],
            'captcha' => [
                'CONTACT_CAPTCHA_STATUS' => 'Contact Captcha Status',
                'REGISTRATION_CAPTCHA_STATUS' => 'Registration Captcha Satus',
                'INVISIBLE_RECAPTCHA_BADGEHIDE' => 'Invisible Recaptcha Badgehide',
                'INVISIBLE_RECAPTCHA_DEBUG' => 'Invisible Recaptcha Debug',
                'INVISIBLE_RECAPTCHA_TIMEOUT' => 'Inivisible Recaptcha Timeout',
                'INVISIBLE_RECAPTCHA_DATABADGE' => 'Invisible Recaptcha Databadge',
                'INVISIBLE_RECAPTCHA_SITEKEY' => 'Invisible Recaptcha Sitekey',
                'INVISIBLE_RECAPTCHA_SECRETKEY' => 'Invisible Recaptcha Secretkey',
            ],
        ]
    ],

];
