<?php

namespace Nexus;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

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
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'admin' => [
            'admin.auth',
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

        // Helpers
        $this->registerHelpers();

        // Register Blade Components
        $component = method_exists(BladeCompiler::class, 'aliasComponent') ?
            'aliasComponent' : 'component';

        Blade::{$component}('nexus::components/model-property', 'modelProperty');
        Blade::{$component}('nexus::misc/table', 'table');
        Blade::{$component}('nexus::components/checkbox', 'checkbox');

        // Alias
        Blade::include('nexus::layouts/messages', 'messages');
        Blade::include('nexus::components/file', 'file');

        // Custom Exception Handler
        $this->app->bind(
            \App\Exceptions\Handler::class,
            \Nexus\Exceptions\Handler::class
        );
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
            __DIR__ . '/../public/assets/css/app.css' => public_path('vendor/nexus/assets/css/app.css'),
            __DIR__ . '/../public/assets/css/mango.css' => public_path('vendor/nexus/assets/css/mango.css'),
        ], 'nexus-css');

        $this->publishes([
            __DIR__ . '/../database/factories' => database_path('factories')
        ], 'nexus-factories');

        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'nexus-migrations');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/nexus')
        ], 'nexus-lang');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/nexus'),
        ], 'nexus-views');

        $this->publishes([
            __DIR__ . '/../resources/assets/fonts' => public_path('assets/fonts'),
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
        if (config('nexus.load_base_routes', true)) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/backend.php');
        }

        if (config('nexus.load_custom_routes', true)) {
            $userRouteFile = config('nexus.backend_routes_file');

            if (
                $userRouteFile &&
                ($userRoutePath = base_path('routes/' . $userRouteFile)) &&
                file_exists($userRoutePath)
                ) {
                $this->loadRoutesFrom($userRoutePath);
            }
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

        AliasLoader::getInstance(['Str' => \Illuminate\Support\Str::class]);
    }

    public function registerCommands()
    {
        $this->commands([
            Console\Commands\UserCommand::class,
            Console\Commands\InstallCommand::class,
            Console\Commands\SeedCommand::class,

            Console\Commands\ForgeController::class,
            Console\Commands\ForgeModel::class,
            Console\Commands\ForgeStoreRequest::class,
            Console\Commands\ForgeUpdateRequest::class,

            Console\Commands\ForgeResource::class,
            Console\Commands\ForgeResourceModel::class,

            Console\Commands\ForgeCRUDController::class,
            Console\Commands\ForgeCRUDViews::class,
            Console\Commands\ForgeCRUD::class,
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
