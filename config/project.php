<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Route Prefix
    |--------------------------------------------------------------------------
    |
    | This prefix method can be used for the prefix of each
    | route in the administration panel. For example, you can change to 'console'
    |
    */

    'prefix' => env('DASHBOARD_PREFIX', 'console'),

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | Provide a convenient mechanism for filtering HTTP
    | requests entering your application.
    |
    */

    'middleware' => [
        'public' => ['web'],
        'admin'  => ['web', 'admin']
    ],

    /*
    |--------------------------------------------------------------------------
    | Application captcha specific settings
    |--------------------------------------------------------------------------
    |
    | Whether the registration captcha is on or off
    |
    */

    'captcha' => [
        'registration' => env('REGISTRATION_CAPTCHA_STATUS', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Registration
    |--------------------------------------------------------------------------
    |
    | Whether or not registration is enabled
    |
    */

    'registration' => env('ENABLE_REGISTRATION', true),

    /*
    |--------------------------------------------------------------------------
    | Table names for access tables
    |--------------------------------------------------------------------------
    |
    |
    */

    'table_names' => [
        'password_histories' => 'password_histories',
        'users' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Configurations for the user
    |--------------------------------------------------------------------------
    |
    */

    'users' => [
        'confirm_email' => env('CONFIRM_EMAIL', false),
        'change_email' => env('CHANGE_EMAIL', false),
        'admin_role' => 'administrator',
        'default_role' => 'user',

        /*
         * Whether or not new users need to be approved by an administrator before logging in
         * If this is set to true, then confirm_email is not in effect
         */
        'requires_approval' => env('REQUIRES_APPROVAL', false),

        // Login username to be used by the controller.
        'username' => 'email',

        /*
         * When active, a user can only have one session active at a time
         * That is all other sessions for that user will be deleted when they log in
         * (They can only be logged into one place at a time, all others will be logged out)
         * AuthenticateSession middleware must be enabled
         */
        'single_login' => env('SINGLE_LOGIN', true),

        /*
         * How many days before users have to change their passwords
         * false is off
         */
        'password_expires_days' => env('PASSWORD_EXPIRES_DAYS', 60),

        /*
         * The number of most recent previous passwords to check against when changing/resetting a password
         * false is off which doesn't log password changes or check against them
         */
        'password_history' => env('PASSWORD_HISTORY', 3),
    ],

    /*
    |--------------------------------------------------------------------------
    | Configurations for roles
    |--------------------------------------------------------------------------
    |
    | Whether a role must contain a permission or can be used standalone as a label
    |
    */

    'roles' => [
        'role_must_contain_permission' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Socialite session variable name
    |--------------------------------------------------------------------------
    |
    | Contains the name of the currently logged in provider in the users session
    | Makes it so social logins can not change passwords, etc.
    |
    */

    'socialite_session_name' => 'socialite_provider',

    /*
    |--------------------------------------------------------------------------
    | Google Analytics
    |--------------------------------------------------------------------------
    |
    | Found in {theme}/includes/partials/ga.blade.php
    */

    'google-analytics' => env('GOOGLE_ANALYTICS', 'UA-XXXXX-X'),
];
