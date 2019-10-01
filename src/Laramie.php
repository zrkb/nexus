<?php

namespace Pandorga\Laramie;

use Illuminate\Support\Facades\Route;

class Laramie
{
	/**
	 * Auth routes.
	 */
	public function authRoutes()
	{
		$attributes = [
			'prefix'     => config('laramie.route.prefix'),
			'namespace'  => '\Pandorga\Laramie\Http\Controllers\Auth',
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
     * Route a laramie resource to a controller.
     *
     * @param  string  $name
     * @param  string  $controller
     * @param  array   $options
     * @return void
     */
	public function resource($name, $controller, array $options = [])
	{
		$attributes = [
			'prefix'     => config('laramie.route.prefix'),
			'namespace'  => config('laramie.route.namespace'),
			'middleware' => config('laramie.route.middleware'),
		];

		Route::group($attributes, function () use ($name, $controller, $options) {
			Route::resource($name, $controller, $options);
			Route::post("{$name}/{id}/restore", "{$controller}@restore")
				 ->name("{$name}.restore");
		});
	}
}
