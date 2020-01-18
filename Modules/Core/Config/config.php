<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Module Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your module. This value is used when the
    | package needs to place the module's name
    |
    */

    'name' => 'Core',

    /*
    |------------------------------------------------------------------ø--------
    | Default active Theme
    |--------------------------------------------------------------------------
    |
    | Default active themename. like as
    | 'backend_active' => 'keenone',
    | 'frontend_active' => 'bootstrap',
    |
    */

    'theme' => [
        'backend'   => 'keenone',
        'frontend'  => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Themes path
    |--------------------------------------------------------------------------
    |
    | This path used for save the generated theme. This path also will added
    | automatically to list of scanned folders.
    |
    */

    'theme_path' => base_path('Themes'),

    /*
    |--------------------------------------------------------------------------
    | Symbolic link
    |--------------------------------------------------------------------------
    |
    | If you theme_path is not in public folder then symlink must be true
    | otherwise theme assets not working. If your theme_path under public folder
    | then symlink can be false or true as your wish.
    |
    */

    'symlink'    => true,

    /*
    |--------------------------------------------------------------------------
    | Theme types where you can set default theme for particular middleware.
    |--------------------------------------------------------------------------
    | 'types'     => [
    |       'enable' => true or false,
    |       'middleware' => [
    |           'middlewareName'      => 'themeName',
    |       ]
    |   ],
    |
    | For Example route
    | Route::get('/', function () {
    |       return view('welcome');
    | })->middleware('example');
    |
    |
    */

    'types'     => [
        'enable'      => true,
        'middleware'  => [
            'admin'  => 'demo1',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme config name and change log file name
    |--------------------------------------------------------------------------
    |
    | Here is the config for theme.json file and changelog
    | for version control status
    |
    */

    'config'     => [
        'name'      => 'theme.json',
        'changelog' => 'changelog.yml',
    ],

    /*
    |--------------------------------------------------------------------------
    | Themes folder structure
    |--------------------------------------------------------------------------
    |
    | Here you may update theme folder structure.
    |
    */

    'folders'    => [
        'assets'  => 'assets',
        'views'   => 'views',
        'lang'    => 'lang',
        'lang/en' => 'lang/en',
        'lang/fr' => 'lang/fr',

        'css' => 'assets/css',
        'js'  => 'assets/js',
        'img' => 'assets/img',

        'layouts' => 'views/layouts',
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme Stubs
    |--------------------------------------------------------------------------
    |
    | Default theme stubs.
    |
    */

    'stubs' => [
        'path'  => base_path('Modules/Core/Console/stubs'),
        'files' => [
            'css'    => 'assets/css/app.css',
            'layout' => 'views/layouts/master.blade.php',
            'page'   => 'views/welcome.blade.php',
            'lang'   => 'lang/en/messages.php',
        ],
    ],
];
