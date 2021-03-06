<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

if (! function_exists('route_filter')) {
    /**
     * Imprime todos los datos del objeto Request $request
     *
     * @return array
     */
    function route_filter($params = []) {
        $params = array_merge($params, request()->all());

        return route(request()->route()->getName(), $params);
    }
}

if (! function_exists('rr')) {
    /**
     * Imprime todos los datos del objeto Request $request
     *
     * @return array
     */
    function rr() {
        dd(request()->all());
    }
}

if (! function_exists('version')) {
    /**
     * Retorna una instancia de la Clase \PragmaRX\Version\Package\Version.
     *
     * @return \PragmaRX\Version\Package\Version
     */
    function version() {
        return app(\PragmaRX\Version\Package\Version::class);
    }
}

if (! function_exists('check')) {
    /**
     * Corrobora una sentencia lógica para lanzar strings de acuerdo al resultado de la bandera.
     *
     * @param bool $condition
     * @param string $true
     * @param string $false
     *
     * @return string
     */
    function check(bool $condition, $true = 'success', $false = 'warning') {
        return $condition ? $true : $false;
    }
}

if (! function_exists('cached')) {
    function cached()
    {
        $debug = config('app.env');

        if ($debug == 'production') {
            return version()->build();
        } else {
            return time();
        }
    }
}

if (! function_exists('truncate')) {
    function truncate($number, int $precision = null)
    {
        return round($number, $precision ?? cons('numeric_precision', 2));
    }
}

if (! function_exists('percent')) {
    function percent($reached, $total)
    {
        $result = ($reached / $total) * 100;
        $formatted = truncate($result);

        return $formatted;
    }
}

if (! function_exists('cons')) {
    function cons($key = null)
    {
        $constants = config('constants');

        return is_null($key) ? $constants : Arr::get($constants, $key);
    }
}

if (!function_exists('dashboard')) {
    function dashboard()
    {
        return app(\App\Utilities\Dashboard::class);
    }
}

if (!function_exists('admin_base_path')) {
    /**
     * Get admin url.
     *
     * @param string $path
     *
     * @return string
     */
    function admin_base_path($path = '')
    {
        $prefix = '/'.trim(config('nexus.route.prefix'), '/');

        $prefix = ($prefix == '/') ? '' : $prefix;

        return $prefix.'/'.trim($path, '/');
    }
}

if (! function_exists('is_route')) {
    /**
     * Check if user is viewing the specified route
     *
     * @return bool
     */
    function is_route(string $route): bool
    {
        return Route::currentRouteName() == $route;
    }
}

if (! function_exists('is_resource_route')) {
    /**
     * Check if user is viewing the specified resource
     *
     * @return bool
     */
    function is_resource_route(string $resource): bool
    {
        $route = explode('.', Route::currentRouteName());
        array_pop($route);
        $resourceName = implode('.', $route);

        return $resourceName == $resource;
    }
}

if (! function_exists('is_resource')) {
    /**
     * Check if user is viewing the specified route
     *
     * @return bool
     */
    function is_resource(string $resource): bool
    {
        return is_resource_route($resource);
    }
}
