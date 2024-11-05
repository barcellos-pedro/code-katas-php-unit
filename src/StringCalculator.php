<?php

namespace App;

use Exception;

class StringCalculator
{
    protected const int MAX_NUMBER_ALLOWED = 1000;

    protected const string DEFAULT_DELIMITER = "/[,|\n]/";

    /**
     * @throws Exception
     */
    public static function add(string $numbers): int
    {
        if (static::isEmpty($numbers)) return 0;

        $values = static::getNumbers($numbers);

        if (count($values) == 1) {
            return self::firstOrFail($values);
        }

        return static::total($values);
    }

    /**
     * @param array $values
     * @return mixed
     * @throws Exception
     */
    public static function total(array $values): mixed
    {
        return array_reduce($values, function ($carry, $item) {
            $item = (int)$item;

            if ($item < 0) {
                static::throwException($item);
            }

            if ($item > self::MAX_NUMBER_ALLOWED) {
                return $carry + 0;
            }

            return $carry + $item;
        });
    }

    /**
     * @throws Exception
     */
    public static function throwException(int|string $item)
    {
        throw new Exception("negatives not allowed => {$item}");
    }

    /**
     * @param string $numbers
     * @return bool
     */
    public static function isEmpty(string $numbers): bool
    {
        return !$numbers || strlen(trim($numbers)) == 0;
    }

    /**
     * @param string $numbers
     * @return string[]
     */
    public static function getNumbers(string $numbers): array
    {
        if (!self::hasCustomDelimiter($numbers)) {
            return preg_split(self::DEFAULT_DELIMITER, $numbers);
        }

        $delimiter = self::getCustomDelimiter($numbers);

        $numbers = substr($numbers, 4);

        return explode($delimiter, $numbers);
    }

    public static function getCustomDelimiter(string $numbers): string
    {
        return $numbers[strpos($numbers, '//') + 2];
    }

    /**
     * @param array $values
     * @return mixed
     * @throws Exception
     */
    public static function firstOrFail(array $values): mixed
    {
        [$value] = $values;

        if ($value < 0) {
            static::throwException($value);
        }

        if ($value > self::MAX_NUMBER_ALLOWED) {
            return 0;
        }

        return $value;
    }

    /**
     * @param string $numbers
     * @return bool
     */
    public static function hasCustomDelimiter(string $numbers): bool
    {
        return str_contains($numbers, '//');
    }
}