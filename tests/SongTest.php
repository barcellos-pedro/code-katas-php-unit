<?php

use App\Song;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class SongTest extends TestCase
{
    #[Test]
    public function ninety_nine_bottles()
    {
        $expected =
            "99 bottles of beer on the wall, 99 bottles of beer.\n" .
            "Take one down and pass it around, 98 bottles of beer on the wall.";

        $result = Song::verse(number: 99);

        $this->assertEquals($expected, $result);
    }

    #[Test]
    public function ninety_eight_bottles()
    {
        $expected =
            "98 bottles of beer on the wall, 98 bottles of beer.\n" .
            "Take one down and pass it around, 97 bottles of beer on the wall.";

        $result = Song::verse(number: 98);

        $this->assertEquals($expected, $result);
    }

    #[Test]
    public function two_bottles()
    {
        $expected =
            "2 bottles of beer on the wall, 2 bottles of beer.\n" .
            "Take one down and pass it around, 1 bottle of beer on the wall.";

        $result = Song::verse(number: 2);

        $this->assertEquals($expected, $result);
    }

    #[Test]
    public function one_bottle()
    {
        $expected =
            "1 bottle of beer on the wall, 1 bottle of beer.\n" .
            "Take one down and pass it around, no more bottles of beer on the wall.";

        $result = Song::verse(number: 1);

        $this->assertEquals($expected, $result);
    }

    #[Test]
    public function no_bottles()
    {
        $expected =
            "No more bottles of beer on the wall, no more bottles of beer.\n" .
            "Go to the store and buy some more, 99 bottles of beer on the wall.";

        $result = Song::verse(number: 0);

        $this->assertEquals($expected, $result);
    }

    // #[Test]
    // public function it_gets_the_lyrics()
    // {
    //     $song = new Song;
    //     $result = $song->sing();
        
    //     $expected = file_get_contents(Song::LYRICS_PATH);
        
    //     $this->assertEquals($expected, $result);
    // }
}
