<?php

use App\RomanNumerals;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class RomanNumeralsTest extends TestCase
{
    #[DataProvider('numbers')]
    #[Test]
    public function testGeneratesTheRomanNumber($number, $expected)
    {
        $this->assertEquals($expected, RomanNumerals::generate($number));
    }

    #[Test]
    public function testCannotGenerateRomanNumberLessThanOne()
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }

    #[Test]
    public function testCannotGenerateRomanNumberGreaterThan3999()
    {
        $this->assertFalse(RomanNumerals::generate(4000));
    }

    public static function numbers(): array
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
            [3999, 'MMMCMXCIX']
        ];
    }
}
