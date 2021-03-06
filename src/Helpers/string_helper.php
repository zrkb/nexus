<?php

if (! function_exists('parse_amount')) {
    /**
     * Parse amount string like (#.###.###,##) and converting it to (#######.##)
     *
     * @param string $string
     * @param bool $truncate
     */
    function parse_amount(string $string, bool $truncate = false) : float {
        $string = str_replace('.', '', $string);
        $string = str_replace(',', '.', $string);

        $float = (float) $string;

        if ($truncate === true) {
            $float = number_format($float, cons('numeric_precision', 2), '.', '');
        }

        return $float;
    }
}

if (! function_exists('add_thousands_separator')) {
    function add_thousands_separator($string, int $precision = null, $decimalPoint = ',', $thousandsSeparator = '.') {
        $number = (float) $string;
        $number = number_format($number, $precision ?? cons('numeric_precision', 2), $decimalPoint, $thousandsSeparator);

        return $number;
    }
}

if (! function_exists('remove_thousands_separator')) {
    /**
     * Removes thousand separators from string.
     *
     * @param string $string
     * @param string $separator
     * @param string $replace
     *
     * @return string
     */
    function remove_thousands_separator($string, $separator = '.', $replace = '') : string {
        $string = str_replace($separator, $replace, $string);

        return $string;
    }
}

if (! function_exists('format_amount')) {
    function format_amount($amount, $prefix = 'Gs. ', int $precision = null, $decimalPoint = ',', $thousandsSeparator = '.') : string {
        return money($amount, $prefix, $precision, $decimalPoint, $thousandsSeparator);
    }
}

if (! function_exists('money')) {
    function money($amount, $prefix = 'Gs. ', int $precision = null, $decimalPoint = ',', $thousandsSeparator = '.') : string {
        return $prefix . add_thousands_separator($amount, $precision, $decimalPoint, $thousandsSeparator);
    }
}
