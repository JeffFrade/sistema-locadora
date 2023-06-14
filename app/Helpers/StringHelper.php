<?php

namespace App\Helpers;

class StringHelper
{
    public static function hashPassword(?string $password)
    {
        if (empty($password)) {
            return null;
        }

        return \Hash::make($password);
    }

    public static function mask(string $value, string $mask)
    {
        $masked = '';
        $k = 0;

        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#' && isset($value[$k])) {
                $masked .= $value[$k++];
            } elseif (isset($mask[$i])) {
                $masked .= $mask[$i];
            }
        }

        return $masked;
    }

    public static function maskPhone(string $phone)
    {
        $maked = self::mask($phone, '(##) ####-####');

        if (strlen($phone) == 11) {
            $maked = self::mask($phone, '(##) #####-####');
        }

        return $maked;
    }

    public static function clearString(string $value = '')
    {
        if (preg_match('/\d+/i', $value)) {
            return preg_replace('/\D+/i', '', $value);
        }

        return $value;
    }
}
