<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Nexus\Html\Html;
use Nexus\Html\Elements\Form;
use Nexus\Nexus;

if (! function_exists('assets_path')) {
    /**
     * Get the path to the assets folder.
     *
     * @return string
     */
    function assets_path(): string
    {
        return '/vendor/nexus';
    }
}

if (! function_exists('nexus')) {
    /**
     * Get the Nexus instance.
     *
     * @return \Nexus\Nexus
     */
    function nexus()
    {
        return app(Nexus::class);
    }
}

if (! function_exists('resource')) {
    /**
     * Create a route from an action.
     *
     * @return string
     */
    function resource($action = null, $params = []) : string
    {
        $action = $action ? ('.' . $action) : '';

        return route(Arr::first(explode('.', request()->route()->getName())) . $action, $params);
    }
}

if (! function_exists('__m')) {
    /**
     * Translate model name.
     *
     * @param  string  $model
     * @return string
     */
    function __m($model): string
    {
        $model = Str::snake(Str::plural($model));
        $key = "models.{$model}";
        $trans = __($key);

        return $key == $trans ? $model : $trans;
    }
}

if (! function_exists('admin')) {
    /**
     * Returns auth admin.
     *
     * @return \Nexus\Models\Admin
     */
    function admin(): \Nexus\Models\Admin
    {
        return auth()->guard('admin')->user();
    }
}

if (! function_exists('user')) {
    /**
     * Returns auth user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function user(): \Illuminate\Contracts\Auth\Authenticatable|null
    {
        return auth()->guard('web')->user();
    }
}

if (! function_exists('form')) {
    function form()
    {
        return app(\Collective\Html\FormBuilder::class);
    }
}
if (! function_exists('dev_role')) {
    /**
     * Get the developer role.
     *
     * @return string
     */
    function dev_role(): string
    {
        return 'Developer';
    }
}

if (! function_exists('package_path')) {
    /**
     * Get the path to the package folder.
     *
     * @param  string  $path
     * @return string
     */
    function package_path($path = ''): string
    {
        return __DIR__ . '/../..' . ($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (! function_exists('format_bytes')) {
    /**
     * Format bytes to kb, mb, gb, tb
     *
     * @param  int $size
     * @param  int $precision
     * @return int
     */
    function format_bytes($size, $precision = 2): int
    {
        if ($size <= 0) return 0;

        $size = (int) $size;
        $base = log($size) / log(1024);
        $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    }
}
