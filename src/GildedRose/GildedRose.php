<?php

namespace App\GildedRose;

use InvalidArgumentException;

class GildedRose
{
    private static array $ITEMS = [
        'normal' => Item::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePasses::class,
        'Conjured Mana Cake' => ConjuredCake::class
    ];

    public static function of($name, $quality, $sellIn): Item
    {
        if (!self::$ITEMS[$name] ?? false) {
            throw new InvalidArgumentException('Item type does not exists.');
        }

        $class = self::$ITEMS[$name];

        return new $class($quality, $sellIn);
    }
}