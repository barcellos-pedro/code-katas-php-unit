<?php

namespace App;

class TennisMatch
{
    protected Player $playerOne;

    protected Player $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score(): string
    {
        if ($this->hasWinner()) {
            return "Winner: " . $this->leader()->name;
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        if ($this->hasAdvantage()) {
            return "Advantage: " . $this->leader()->name;
        }

        return $this->calculate();
    }

    public function pointTo(Player $player): void
    {
        $player->score();
    }

    protected function hasWinner(): bool
    {
        $belowThreshold = max($this->playerOne->points(), $this->playerTwo->points()) < 4;

        if ($belowThreshold){
            return false;
        }

        $playerOneWon = $this->playerOne->points() >= $this->playerTwo->points() + 2;
        $playerTwoWon = $this->playerTwo->points() >= $this->playerOne->points() + 2;

        return $playerOneWon || $playerTwoWon;
    }

    protected function calculate(): string
    {
        return sprintf(
            "%s-%s",
            $this->playerOne->pointsTerm(),
            $this->playerTwo->pointsTerm()
        );
    }

    protected function leader(): string|Player
    {
        if ($this->tie()) {
            return '';
        }

        return $this->playerOne->points() > $this->playerTwo->points() ?
            $this->playerOne :
            $this->playerTwo;
    }

    protected function isDeuce(): bool
    {
        return $this->canBeWon() && $this->tie();
    }

    protected function canBeWon(): bool
    {
        return $this->playerOne->points() >= 3 && $this->playerTwo->points() >= 3;
    }

    protected function hasAdvantage(): bool
    {
        return $this->canBeWon() && !$this->tie();
    }

    protected function tie(): bool
    {
        return $this->playerOne->points() == $this->playerTwo->points();
    }
}