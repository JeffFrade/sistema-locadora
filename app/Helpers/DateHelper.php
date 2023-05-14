<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function formatDate(string $date, string $format = 'd/m/Y')
    {
        return Carbon::parse($date)
            ->format($format);
    }
}
