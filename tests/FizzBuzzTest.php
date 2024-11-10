<?php


use App\FizzBuzz;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    #[Test]
    public function fizz()
    {
        $this->assertSame('fizz', FizzBuzz::get(3));
    }

    #[Test]
    public function buzz()
    {
        $this->assertSame('buzz', FizzBuzz::get(5));
    }

    #[Test]
    public function fizzbuzz()
    {
        $this->assertSame('fizzbuzz', FizzBuzz::get(15));
    }

    #[Test]
    public function it_returns_number_for_one()
    {
        $this->assertSame(1, FizzBuzz::get(1));
    }
}
