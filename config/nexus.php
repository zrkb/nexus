<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backend Route Configurations
    |--------------------------------------------------------------------------
    */
    'load_base_routes' => true,

    'backend_routes_file' => 'backend.php',

    'route' => [
        'prefix' => 'app',
        'namespace' => '\App\Http\Controllers\Backend',
        'middleware' => ['web', 'admin'],
    ],

    'directory' => app_path('Http/Controllers/Backend'),

    'controller' => 'AppController',

    'registration_enabled' => true,

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
