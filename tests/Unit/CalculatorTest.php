<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Utilities\Calculator;

class CalculatorTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $sum  = Calculator::add(5,5);

        $this->assertEquals(10, $sum);
    }
}
