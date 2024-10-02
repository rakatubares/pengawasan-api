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
            $string = trim(preg_replace('/[^\S\r\n]+/', ' ', $string));
        }
        return $string;
    }
}
