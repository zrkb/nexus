<?php

use Carbon\Carbon;

if (! function_exists('months_for_select')) {
	/**
	 * Retorna la lista de meses para rellenar un <select>
	 * 
	 * @param $all Si este parametro viene con valor false, la opción "Todos" no se devolverá
	 */
	function months_for_select(Bool $all = true)
	{
		
		$months = [0 => 'Todos'];

		for ($x = 1; $x <= 12; $x ++) {
			$months[$x] = month_name($x);
		}

		if ($all == false) unset($months[0]);

		return $months;
	}
}

if (! function_exists('month_name')) {
	/**
	 * Retorna la fecha actual
	 */
	function month_name($month)
	{
		$time = mktime(0, 0, 0, (int)$month, 1);
		$key = date('m', $time);
		$name =  ucfirst(strftime('%B', $time));

		return $name;
	}
}

if (! function_exists('years_for_select')) {
	/**
	 * Retorna la lista de años para rellenar un <select>
	 */
	function years_for_select($width = 5)
	{
		$init = 2017;
		$end = ((int)date('Y')) + $width; 

		$years = [];

		for ($i = $init; $i <= $end; $i++) {
			$years[$i] = $i;
		}

		return $years;
	}
}

if (! function_exists('now')) {
	/**
	 * Get Carbon instance for current date and time
	 * 
	 * @return static
	 */
	function now()
	{
		return Carbon::now();
	}
}

if (! function_exists('set_locale')) {
	function set_locale()
	{
		setlocale(LC_ALL, 'es_ES', 'es', 'ES');
		Carbon::setLocale(config('app.locale'));
	}
}

if (! function_exists('greetings')) {
	function greetings($suffix = '')
	{
		$greet = '';

		/* This sets the $time variable to the current hour in the 24 hour clock format */
	    $time = date("H");
	    /* Set the $timezone variable to become the current timezone */
	    $timezone = date("e");

	    /* If the time is less than 1200 hours, show good morning */
	    if ($time < "12") {
	        $greet = "Buenos días";
	    } else
	    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
	    if ($time >= "12" && $time < "19") {
	        $greet = "Buenas tardes";
	    } else
	    /* Finally, show good night if the time is greater than or equal to 1900 hours */
	    if ($time >= "19") {
	        $greet = "Buenas noches";
	    }

	    return $greet . ' ' . $suffix;
	}
}
