<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User config
    |--------------------------------------------------------------------------
    |
    | Here you can specify socialite user configs
    | *table* : The users tables in your application
    |
    */

    'users' => [
        'table'   => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Socialite provider
    |--------------------------------------------------------------------------
    |
    | Here you can specify the specific provider you need for your application
    | Supported: "facebook", "google", "github", "twitter", "linkedin", "bitbucket"
    | "instagram", "dribbble", "pinterest", "youtube", "gitlab"
    |
    */

    'providers' => [
        'facebook'  => true,
        'google'    => true,
        'github'    => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Socialite Buttons styles
    |--------------------------------------------------------------------------
    |
    | Socialite buttons default style.
    | To use your own css classes, you can modify the following classes
    | and replace with yours. By default Boostrap buttons class are used
    | if you want to use outline buttons (which add 'btn-outline-provider' class)
    | you have to pass to outline index on buttons array to true
    |
    |
    | example:
    | 'buttons' => [
    |     'class'    => 'btn btn-social'
    |     'icon'     => false,
    |     'outline'  => false,
    |  ]
    |
    | 'buttons' => [
    |     'class'    => 'btn btn-social btn-block'
    |     'icon'     => true,
    |     'outline'  => false,
    |  ]
    |
    */

    'buttons' => [
        'class'     => 'btn btn-social btn-block',
        'icon'      => true,
        'outline'   => false,
    ],

];
