<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backend Route Configurations
    |--------------------------------------------------------------------------
    */
    'load_base_routes' => true,

    'load_custom_routes' => false,

    'backend_routes_file' => 'backend.php',

    'route' => [
        'prefix' => 'admin',
        'namespace' => '\App\Http\Controllers\Backend',
        'middleware' => ['web', 'admin'],
    ],

    'directory' => app_path('Http/Controllers/Backend'),

    'controller' => 'AppController',

    'registration_enabled' => false,

    'models' => [
        'admin' => \Nexus\Models\Admin::class,
    ],

    'general_sidebar_items' => 'nexus::sidebar/user',

    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    |
    | Supported: "app", "mango"
    |
    */
    'theme' => 'app',

    'sidebar_color_scheme' => 'navbar-dark bg-dark',

    /*
    |--------------------------------------------------------------------------
    | Mapbox Access Token
    |--------------------------------------------------------------------------
    |
    | Public access token used by the theme's map module ([data-map] elements).
    | Leave it empty to disable maps. Get one at https://account.mapbox.com/
    |
    */
    'mapbox_token' => env('MAPBOX_TOKEN', ''),

    'welcome_illustration' => assets_path() . '/assets/img/illustrations/happiness.svg',

    /*
    |--------------------------------------------------------------------------
    | Auth Guards
    |--------------------------------------------------------------------------
    */
    'auth' => [
        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admins',
            ],
        ],

        'providers' => [
            'admins' => [
                'driver' => 'eloquent',
                'model'  => \Nexus\Models\Admin::class,
            ],
        ],

        'passwords' => [
            'admins' => [
                'provider' => 'admins',
                'table' => 'password_resets',
                'expire' => 15,
            ],
        ],
    ],
];
