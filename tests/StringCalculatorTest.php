<?php

use App\StringCalculator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    #[Test]
    public function it_evaluates_to_zero()
    {
        $this->assertSame(0, StringCalculator::add(''));
    }

    #[Test]
    public function it_evaluates_the_sum_of_single_number()
    {
        $this->assertSame(1, StringCalculator::add('1'));
    }

    #[Test]
    public function it_evaluates_to_three()
    {
        $this->assertSame(3, StringCalculator::add('1,2'));
    }

    #[Test]
    public function it_evaluates_more_than_two_numbers()
    {
        $this->assertSame(15, StringCalculator::add('1,2,3,4,5'));
    }

    #[Test]
    public function it_accepts_a_new_line_delimiter()
    {
        $this->assertSame(6, StringCalculator::add("1\n2,3"));
    }

    #[Test]
    public function it_should_ignore_number_bigger_than_one_thousand()
    {
        $this->assertSame(2, StringCalculator::add("2,1001"));
    }

    #[Test]
    public function it_accepts_comma_as_delimiter()
    {
        $this->assertSame(9, StringCalculator::add("//:\n5:4"));
    }

    #[Test]
    public function it_accepts_at_as_delimiter()
    {
        $this->assertSame(20, StringCalculator::add("//@\n10@10"));
    }

    #[Test]
    public function it_throws_exception_with_negative_value()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('negatives not allowed => -2');
        StringCalculator::add('3,-2');
    }
}