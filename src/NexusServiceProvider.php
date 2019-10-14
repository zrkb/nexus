<?php

namespace Nexus;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nexus\Http\Middleware\AppLocale;

class NexusServiceProvider extends ServiceProvider
{
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'admin.auth'       => \Nexus\Http\Middleware\Authenticate::class,
        'can_register'		=> \Nexus\Http\Middleware\CanRegister::class,
        // 'admin.pjax'       => \Nexus\Middleware\Pjax::class,
        // 'admin.log'        => \Nexus\Middleware\LogOperation::class,
        // 'admin.permission' => \Nexus\Middleware\Permission::class,
        // 'admin.bootstrap'  => \Nexus\Middleware\Bootstrap::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'admin' => [
            'admin.auth',
            // 'admin.pjax',
            // 'admin.log',
            // 'admin.bootstrap',
            // 'admin.permission',
        ],
    ];

	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		if ($this->app->runningInConsole()) {
			$this->publishResources();
			$this->registerCommands();
		}

		$this->loadResources();
		
        if (! $this->app->configurationIsCached()) {
			$this->mergeConfigFrom(__DIR__ . '/../config/nexus.php', 'nexus');
		}

        // Middlewares
        $this->registerMiddlewares();

        // Helpers
        $this->registerHelpers();

		// Register Blade Components
		Blade::component('nexus::components/model-property', 'modelProperty');
		Blade::component('nexus::misc/table', 'table');
	}

	public function registerMiddlewares()
	{
		$this->app->singleton(CheckForMaintenanceMode::class, function($app){
            return new AppLocale($app);
        });
	}

	public function publishResources()
	{
		$this->publishes([
			__DIR__ . '/../config/nexus.php' => config_path('nexus.php')
		], 'nexus-config');

		$this->publishes([
			__DIR__ . '/../public' => public_path('vendor/nexus')
		], 'nexus-assets');

		$this->publishes([
			__DIR__ . '/../database/factories' => database_path('factories')
		], 'nexus-factories');

		$this->publishes([
			__DIR__ . '/../database/migrations' => database_path('migrations')
		], 'nexus-migrations');

		$this->publishes([
			__DIR__ . '/../resources/lang' => resource_path('lang/vendor/nexus')
		], 'nexus-translations');

		$this->publishes([
			__DIR__ . '/../resources/views' => resource_path('views/vendor/nexus'),
		], 'nexus-views');

		$this->publishes([
			__DIR__ . '/../resources/fonts' => public_path('fonts'),
		], 'nexus-fonts');
	}

    /**
     * Setup auth configuration.
     *
     * @return void
     */
	protected function loadAdminAuthConfig()
    {
        config(Arr::dot(config('nexus.auth', []), 'auth.'));
    }

	public function loadResources()
	{
		// Migrations
		$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Translations
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'nexus');

		// Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nexus');

		// Route Initiator
		$this->loadRoutes();
	}

	public function loadRoutes()
	{
		$this->loadRoutesFrom(__DIR__ . '/../routes/backend.php');

		$userRouteFile = env('backend_routes_file', 'backend.php');
		$userRoutePath = base_path('routes/' . $userRouteFile);

		if (file_exists($userRoutePath)) {
			$this->loadRoutesFrom($userRoutePath);
		}
	}

	/**
	 * Register any package services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->loadAdminAuthConfig();
		$this->registerThirdPartyVendors();
        $this->registerRouteMiddleware();
	}

	public function registerThirdPartyVendors()
	{
		// Activity Log
		$this->app->register(\Spatie\Activitylog\ActivitylogServiceProvider::class);
		
		// Laravel Collective: HTML
		$this->app->register(\Collective\Html\HtmlServiceProvider::class);
		AliasLoader::getInstance(['Form' => \Collective\Html\FormFacade::class]);
		AliasLoader::getInstance(['Html' => \Collective\Html\HtmlFacade::class]);

		// Mediable
		$this->app->register(\Plank\Mediable\MediableServiceProvider::class);
		AliasLoader::getInstance(['MediaUploader' => \Plank\Mediable\MediaUploaderFacade::class]);
	}

	public function registerCommands()
	{
		$this->commands([
			Console\Commands\InstallCommand::class,
			Console\Commands\SeedCommand::class,
			Console\Commands\ForgeController::class,
			Console\Commands\ForgeModel::class,
			Console\Commands\ForgeResource::class,
			Console\Commands\ForgeResourceModel::class,
			Console\Commands\ForgeViews::class,
		]);
	}

	public function registerHelpers()
	{
		foreach (glob(__DIR__ . '/Helpers/*.php') as $filename) {
			require_once($filename);
		}
	}

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }

        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }
}
