<?php

return [
	'route' => [
		'prefix' => 'app',
		'namespace' => '\App\Http\Controllers\Backend',
		'middleware' => ['web', 'admin'],
	],

	'directory' => app_path('Http/Controllers/Backend'),

	'controller' => 'AppController',

    'registration_enabled' => false,

    'backend_routes_file' => 'backend.php',

    'general_sidebar_items' => 'nexus::sidebar/user',

    'sidebar_color_scheme' => 'navbar-dark bg-dark',

    'models' => [
        'admin' => \Nexus\Models\Admin::class,
    ],

    /*
     * Auth Guards
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
