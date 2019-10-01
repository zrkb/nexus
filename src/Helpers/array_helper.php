<?php

if (! function_exists('array_element')) {
	/**
	 * Comprueba si un array contiene un elemento con esa key
	 */
	function array_element(string $key, array $array) {
		// We want to take the performance advantage of isset() while keeping
		// the NULL element correctly detected
		// See: http://php.net/manual/es/function.array-key-exists.php#107786
		if (isset($array[$key]) || array_key_exists($key, $array)) {
			return $array[$key];
		}

		return null;
	}
}
