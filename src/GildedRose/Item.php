<?php

namespace App\GildedRose;

class Item implements Tick
{
    public int $quality;

    public int $sellIn;

    public function __construct(int $quality, int $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick(): void
    {
        $this->sellIn--;
        $this->quality--;

        if ($this->sellIn <= 0) {
            $this->quality--;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }
}