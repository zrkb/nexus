<?php

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

if (! function_exists('dev_role')) {
	/**
	 * Retorna una cadena con el nombre del Rol Developer
	 * 
	 * @todo Cambiar esta cadena hardcodeada
	 */
	function dev_role() {
		return 'Developer';
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

if (!function_exists('cached')) {
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

if (!function_exists('truncate')) {
	function truncate($number, int $precision = null)
	{
		return round($number, $precision ?? cons('numeric_precision', 2));
	}
}

if (!function_exists('percent')) {
	function percent($reached, $total)
	{
		$result = ($reached / $total) * 100;
		$formatted = truncate($result);

		return $formatted;
	}
}

if (!function_exists('cons')) {
	function cons($key = null)
	{
	    $constants = config('constants');
	    
	    return is_null($key) ? $constants : array_get($constants, $key);
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
        $prefix = '/'.trim(config('laramie.route.prefix'), '/');

        $prefix = ($prefix == '/') ? '' : $prefix;

        return $prefix.'/'.trim($path, '/');
    }
}
