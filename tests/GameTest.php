<?php

use App\Game;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    #[Test]
    public function it_scores_a_gutter_game_as_zero()
    {
        $game = new Game();

        foreach (range(1, 20) as $ignored) {
            $game->roll(0);
        }

        $this->assertSame(0, $game->score());
    }

    #[Test]
    public function it_scores_all_ones()
    {
        $game = new Game();

        foreach (range(1, 20) as $ignored) {
            $game->roll(1);
        }

        $this->assertSame(20, $game->score());
    }

    #[Test]
    public function it_awards_one_roll_bouns_for_every_spare()
    {
        $game = new Game();

        $game->roll(5);
        $game->roll(5);
        $game->roll(8);

        foreach (range(1, 17) as $ignored) {
            $game->roll(0);
        }

        $this->assertSame(26, $game->score());
    }

    #[Test]
    public function it_awards_two_roll_bouns_for_every_spare()
    {
        $game = new Game();

        $game->roll(10);
        $game->roll(5);
        $game->roll(2);

        foreach (range(1, 16) as $ignored) {
            $game->roll(0);
        }

        $this->assertSame(24, $game->score());
    }

    #[Test]
    public function it_grants_one_extra_ball_when_spare_final_frame()
    {
        $game = new Game();

        foreach (range(1, 18) as $ignored) {
            $game->roll(0);
        }

        $game->roll(5);
        $game->roll(5);
        $game->roll(5);

        $this->assertSame(15, $game->score());
    }

    #[Test]
    public function it_grants_two_extra_balls_when_strike_final_frame()
    {
        $game = new Game();

        foreach (range(1, 18) as $ignored) {
            $game->roll(0);
        }

        $game->roll(10);
        $game->roll(10);
        $game->roll(10);

        $this->assertSame(30, $game->score());
    }

    #[Test]
    public function it_scores_perfect_game()
    {
        $game = new Game();

        foreach (range(1, 12) as $ignored) {
            $game->roll(10);
        }

        $this->assertSame(300, $game->score());
    }
}