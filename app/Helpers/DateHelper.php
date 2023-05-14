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
}
