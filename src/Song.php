<?php

namespace App;

class Song
{
    public const string LYRICS_PATH = __DIR__ . '/../tests/stubs/lyrics.stub';

    public function sing(): string
    {
        return $this->verses(start: 99, end: 0);
    }

    public function verses(int $start, int $end): string
    {
        $verses = array_map(
            fn($number) => $this->verse($number),
            range($start, $end)
        );

        return implode("\n", $verses);
    }

    public static function verse(int $number): string
    {
        return match ($number) {
            2 => "2 bottles of beer on the wall, 2 bottles of beer.\n" .
                "Take one down and pass it around, 1 bottle of beer on the wall.",
            1 => "1 bottle of beer on the wall, 1 bottle of beer.\n" .
                "Take one down and pass it around, no more bottles of beer on the wall.",
            0 => "No more bottles of beer on the wall, no more bottles of beer.\n" .
                "Go to the store and buy some more, 99 bottles of beer on the wall.",
            default => "$number bottles of beer on the wall, $number bottles of beer.\n" .
                "Take one down and pass it around, " . ($number - 1) . " bottles of beer on the wall."
        };

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
