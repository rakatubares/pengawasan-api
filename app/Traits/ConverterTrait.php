<?php

namespace App\Traits;

trait ConverterTrait
{
    /**
     * Convert date from string, return default value if string is null
     *
     * @param String $dateString
     * @param String $format
     * @param $defaultValue
     */
    public function dateFromText($dateString, $format='Y-m-d', $default=null)
    {
        return $dateString != null ? date($format, strtotime($dateString)) : $default;
    }

    public function cleanString($string) {
        if ($string != null) {
			$string = trim(str_replace('', '-', $string)); // Replace weird dash
			$string = trim(preg_replace('/[^\S\r\n]+/', ' ', $string));
			$string = trim(preg_replace("/[\r\n]{2,}/", "\n", $string));
        }
        return $string;
    }
}
