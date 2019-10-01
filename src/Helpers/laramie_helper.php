<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Pandorga\Laramie\Html\Html;
use Pandorga\Laramie\Html\Elements\Form;
use Pandorga\Laramie\Laramie;

if (! function_exists('assets_path')) {
    /**
     * @return string
     */
    function assets_path()
    {
        return '/vendor/laramie';
    }
}

if (! function_exists('laramie')) {
    /**
     * @return \Pandorga\Laramie\Laramie
     */
    function laramie()
    {
        return app(Laramie::class);
    }
}

if (! function_exists('resource')) {
    /**
     * Create a route from an action.
     * 
     * @return mixed
     */
    function resource($action = null, $params = []) : string
    {
        $action = $action ? ('.' . $action) : '';

        return route(Arr::first(explode('.', request()->route()->getName())) . $action, $params);
    }
}

if (! function_exists('__m')) {
    function __m($model)
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
     * @return \Pandorga\Laramie\Models\Admin
     */
    function admin()
    {
        return auth()->guard('admin')->user();
    }
}

if (! function_exists('user')) {
    /**
     * Returns auth admin.
     * 
     * @return \Pandorga\Laramie\Models\Admin
     */
    function user()
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
    function dev_role() {
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
    function package_path($path = '')
    {
        return __DIR__ . '/../..' . ($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (! function_exists('format_bytes')) {   
    /**
     * Format bytes to kb, mb, gb, tb
     *
     * @param  integer $size
     * @param  integer $precision
     * @return integer
     */
    function format_bytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
}
