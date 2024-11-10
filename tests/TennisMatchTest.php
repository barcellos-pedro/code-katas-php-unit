<?php


use App\Player;
use App\TennisMatch;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    #[Test]
    #[DataProvider('scores')]
    public function it_scores_a_tennis_match(
        $playerOnePoints,
        $playerTwoPoints,
        $score
    )
    {
        $playerOne = new Player('John');
        $playerTwo = Player::as('Jane');

        $match = new TennisMatch($playerOne, $playerTwo);

        for ($i = 0; $i < $playerOnePoints; $i++) {
            $match->pointTo($playerOne);
        }

        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $playerTwo->score();
        }

        $this->assertEquals($score, $match->score());
    }

    public static function scores(): array
    {
        return [
            // Defaults
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 2, 'thirty-thirty'],
            [2, 0, 'thirty-love'],
            [3, 0, 'forty-love'],
            // Deuces
            [3, 3, 'deuce'],
            [5, 5, 'deuce'],
            // Advantages
            [4, 3, 'Advantage: John'],
            [5, 4, 'Advantage: John'],
            [5, 6, 'Advantage: Jane'],
            // Wins
            [4, 0, 'Winner: John'],
            [0, 4, 'Winner: Jane'],
            [6, 4, 'Winner: John'],
            [6, 8, 'Winner: Jane'],
        ];
    }
}
