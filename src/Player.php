<?php

namespace App;

class Player
{
    public string $name;

    protected int $points = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function as(string $name): Player
    {
        return new self($name);
    }

    public function score(): void
    {
        $this->points++;
    }

    public function points(): int
    {
        return $this->points;
    }

    public function pointsTerm(): string
    {
        return match ($this->points) {
            0 => 'love',
            1 => 'fifteen',
            2 => 'thirty',
            3 => 'forty'
        };
    }
}