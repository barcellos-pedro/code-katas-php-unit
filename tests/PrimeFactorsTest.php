<?php

use App\PrimeFactors;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PrimeFactorsTest extends TestCase
{
    #[DataProvider('factors')]
    #[Test]
    public function testGeneratesPrimeFactors($number, $expected): void
    {
        $this->assertEquals(
            $expected,
            PrimeFactors::generate($number)
        );
    }

    public static function factors(): array
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [8, [2, 2, 2]],
            [100, [2, 2, 5, 5]],
            [999, [3, 3, 3, 37]]
        ];
    }
}
