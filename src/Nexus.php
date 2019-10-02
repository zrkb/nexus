<?php

namespace Pandorga\Nexus;

use Illuminate\Support\Facades\Route;

class Nexus
{
	/**
	 * Auth routes.
	 */
	public function authRoutes()
	{
		$attributes = [
			'prefix'     => config('nexus.route.prefix'),
			'namespace'  => '\Pandorga\Nexus\Http\Controllers\Auth',
			'middleware' => 'web',
		];

		Route::group($attributes, function () {

			Route::group(['middleware' => 'can_register'], function () {
				Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
				Route::post('register', 'RegisterController@register');
			});

			Route::get('login', 'LoginController@showLoginForm')->name('login');
			Route::post('login', 'LoginController@login');
			Route::post('logout', 'LoginController@logout');
		});
	}


    /**
     * Route a nexus resource to a controller.
     *
     * @param  string  $name
     * @param  string  $controller
     * @param  array   $options
     * @return void
     */
	public function resource($name, $controller, array $options = [])
	{
		$attributes = [
			'prefix'     => config('nexus.route.prefix'),
			'namespace'  => config('nexus.route.namespace'),
			'middleware' => config('nexus.route.middleware'),
		];

		Route::group($attributes, function () use ($name, $controller, $options) {
			Route::resource($name, $controller, $options);
			Route::post("{$name}/{id}/restore", "{$controller}@restore")
				 ->name("{$name}.restore");
		});
	}
}
