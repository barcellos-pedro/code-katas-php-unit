<?php

namespace App;

class FizzBuzz
{
    public static function get(int $number): string|int
    {
        $result = '';

        if ($number % 3 == 0) {
            $result .= 'fizz';
        }

        if ($number % 5 == 0) {
            $result .= 'buzz';
        }

        return $result ?: $number;
    }
}