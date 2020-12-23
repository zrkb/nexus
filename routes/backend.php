<?php

/*
|----------------------------------------------
| Backend Routes - (Private)
|----------------------------------------------
*/
Nexus::authRoutes();

// Global
Route::group([
    'prefix' => config('nexus.route.prefix'),
    'middleware' => config('nexus.route.middleware'),
], function () {

    // Project Controllers
    Route::group([
        'namespace' => config('nexus.route.namespace')
    ], function () {
        Route::get('/', 'AppController@index')->name('app');
    });

    // Nexus Controllers
    Route::group([
        'namespace' => '\Nexus\\Http\\Controllers'
    ], function () {
        // Activity Log
        Route::get('activities', 'ActivitiesController@index')->name('activities.index');

        // Users
        Route::resource('admins', 'AdminController');
        Route::post('admins/{admin}/restore', 'AdminController@restore')->name('admins.restore');

        // RBAC - Role Based Access Control
        Route::resource('roles', 'RolesController');
        Route::resource('permissions', 'PermissionsController');

        // Profile
        Route::group([
            'prefix' => 'settings',
        ], function () {
            Route::get('profile', 'ProfileController@edit')->name('profile.edit');
            Route::put('profile', 'ProfileController@update')->name('profile.update');
        });
    });

});
