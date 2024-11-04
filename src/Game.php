<?php

namespace App;

class Game
{
    const int FRAMES_PER_GAME = 10;

    private array $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $ignored) {
            $score += $this->defaultFrameScore($roll);

            if ($this->isStrike($roll)) {
                $score += $this->bonus($roll);
                $roll += 1;
                continue;
            }

            if ($this->isSpare($roll)) {
                $score += $this->bonus($roll);
            }

            $roll += 2;
        }

        return $score;
    }

    /**
     * @param int $roll
     * @return bool
     */
    public function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) == 10;
    }

    /**
     * @param int $roll
     * @return bool
     */
    public function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) == 10;
    }

    /**
     * @param int $roll
     * @return int
     */
    public function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    /**
     * @param int $roll
     * @return int
     */
    public function bonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }

    /**
     * @param int $roll
     * @return int
     */
    protected function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}