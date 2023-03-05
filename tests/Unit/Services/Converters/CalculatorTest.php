<?php

namespace Tests\Unit\Services\Converters;

use App\Services\Converters\Calculator;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * Test 0
     *
     * @return void
     */
    public function testMetricZero()
    {
        $this->assertEquals(Calculator::metric(0), "0 ");
    }

    /**
     * Test 0, precision 2
     *
     * @return void
     */
    public function testMetricZeroWithPrecision()
    {
        $this->assertEquals(Calculator::metric(0, 2), "0.00 ");
    }

    /**
     * Test 42
     *
     * @return void
     */
    public function testMetricFourtyTwo()
    {
        $this->assertEquals(Calculator::metric(42), "42 ");
    }

    /**
     * Test 42, precision 4
     *
     * @return void
     */
    public function testMetricFourtyTwoWithPrecision()
    {
        $this->assertEquals(Calculator::metric(42, 4), "42.0000 ");
    }

    /**
     * Test 999
     *
     * @return void
     */
    public function testMetricNineNineNine()
    {
        $this->assertEquals(Calculator::metric(999), "999 ");
    }

    /**
     * Test 999, precision 3
     *
     * @return void
     */
    public function testMetricNineNineNineWithPrecision()
    {
        $this->assertEquals(Calculator::metric(999, 3), "999.000 ");
    }

    /**
     * Test 1,000
     *
     * @return void
     */
    public function testMetricOneThousand()
    {
        $this->assertEquals(Calculator::metric(1000), "1 K");
    }

    /**
     * Test 1,024, precision 2
     *
     * @return void
     */
    public function testMetricOneThousandWithPrecision()
    {
        $this->assertEquals(Calculator::metric(1024, 2), "1.02 K");
    }

    /**
     * Test 1,000,000
     *
     * @return void
     */
    public function testMetricOneMillion()
    {
        $this->assertEquals(Calculator::metric(1000000), "1 M");
    }

    /**
     * Test 1,024,000, precision 3
     *
     * @return void
     */
    public function testMetricOneMillionWithPrecision()
    {
        $this->assertEquals(Calculator::metric(1024000, 3), "1.024 M");
    }

    /**
     * Test 1,000,000,000
     *
     * @return void
     */
    public function testMetricOneTrillion()
    {
        $this->assertEquals(Calculator::metric(1000000000), "1 G");
    }

    /**
     * Test 1,024,000,000, precision 4
     *
     * @return void
     */
    public function testMetricOneTrillionWithPrecision()
    {
        $this->assertEquals(Calculator::metric(1024000000, 4), "1.0240 G");
    }
}
