<?php

namespace App\Services\Converters;

class Calculator
{
    const METRIC_BASE = '';
    const METRIC_GIGA = 'G';
    const METRIC_MEGA = 'M';
    const METRIC_KILO = 'K';
    const METRIC_TERA = 'T';

    const METRIC_SCALE = [
        self::METRIC_BASE,
        self::METRIC_KILO,
        self::METRIC_MEGA,
        self::METRIC_GIGA,
        self::METRIC_TERA,
    ];

    public static function metric($value, $precision = 0) {
        $scale = 0;

        while($value >= 1000) {
            $value = $value / 1000;
            $scale++;
        }

        return number_format($value, $precision)." ".self::METRIC_SCALE[$scale];
    }
}
