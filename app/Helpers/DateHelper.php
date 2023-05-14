<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function formatDateBr(string $date)
    {
        return Carbon::parse($date)
            ->format('d/m/Y');
    }

    public static function formatDateEn(string $date)
    {
        return implode('-', array_reverse(explode('/', $date)));
    }
}
