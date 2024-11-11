<?php

namespace App\GildedRose;

class ConjuredCake extends Item implements Tick
{
    public function tick(): void
    {
        $this->sellIn -= 1;
        $this->quality -= 2;

        if ($this->sellIn <= 0) {
            $this->quality -= 2;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }
}