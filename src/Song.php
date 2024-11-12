<?php

namespace App;

class Song
{
    public const string LYRICS_PATH = __DIR__ . '/stubs/lyrics.stub';

    public function sing()
    {
        return $this->verses(start: 99, end: 0);
    }

    public function verses(int $start, int $end)
    {
        $verses = array_map(
            fn($number) => $this->verse($number),
            range($start, $end)
        );

        return implode("\n", $verses);
    }

    public static function verse(int $number)
    {
        // refactor with scenes
        // TODO: Use match
        if ($number == 2) {
            return
                "2 bottles of beer on the wall, 2 bottles of beer.\n" .
                "Take one down and pass it around, 1 bottle of beer on the wall.";
        } else if ($number == 1) {
            return
                "1 bottle of beer on the wall, 1 bottle of beer.\n" .
                "Take one down and pass it around, no more bottles of beer on the wall.";
        } else if ($number == 0) {
            return
                "No more bottles of beer on the wall, no more bottles of beer.\n" .
                "Go to the store and buy some more, 99 bottles of beer on the wall.";
        }

        return
            "$number bottles of beer on the wall, $number bottles of beer.\n" .
            "Take one down and pass it around, " . ($number - 1) . " bottles of beer on the wall.";

        // old legacy code

        // $firstCount = $number >= 2 ? "bottles" : "bottle";
        // $next = $number - 1;

        // if ($next >= 2) {
        //     $count = "bottles";
        // } else if ($next == 1) {
        //     $count = "bottle";
        // } else {
        //     $count = "no more bottles";
        // }

        // if ($next === 0) {
        //     return
        //         "{$number} {$firstCount} of beer on the wall, $number {$firstCount} of beer.\n" .
        //         "Take one down and pass it around, no more bottles of beer on the wall.";
        // }

        // return
        //     "{$number} {$firstCount} of beer on the wall, $number {$firstCount} of beer.\n" .
        //     "Take one down and pass it around, {$next} {$count} of beer on the wall.";
    }
}
