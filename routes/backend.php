<?php

/*
|----------------------------------------------
| Backend Routes - (Private)
|----------------------------------------------
*/
Nexus::authRoutes();

// Global
Route::group([
	'prefix'		=> config('nexus.route.prefix'),
	'middleware'	=> config('nexus.route.middleware'),
], function () {
	
	// Project Controllers
	Route::group([
		'namespace' => config('nexus.route.namespace')
	], function () {
		// App Route
		Route::get('/',                         	'AppController@index')->name('app');
	});

	// Nexus Controllers
	Route::group([
		'namespace' => '\Pandorga\\Nexus\\Http\\Controllers'
	], function () {
		// Activity Log
		Route::get('activities',					'ActivitiesController@index')->name('activities.index');
		
		// Users
		Route::resource('admins',					'AdminsController');
		Route::post('admins/{admin}/restore',		'AdminsController@restore')->name('admins.restore');

		// RBAC - Role Based Access Control
		Route::resource('roles',					'RolesController');
		Route::resource('permissions',				'PermissionsController');

		// General Errors
		Route::get('errors/{error}', 'ErrorController@show')->name('errors.show');
	});

});
