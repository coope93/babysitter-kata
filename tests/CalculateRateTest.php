<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../Babysitter.php";
require __DIR__ . "/../CalculateRate.php";


class CalculateRateTest extends TestCase
{

    /**
     * @param $start
     * @param $bed
     * @param $end
     * @return int
     */
    private function getRates($start, $bed, $end)
    {
        $rates = new CalculateRate(
            $start,
            $bed,
            $end
        );
        return $rates->getTotalCharge();

    }

    public function testCalculateRate()
    {
        $this->AssertEquals(128, $this->getRates(17,19,4));
        $this->AssertEquals(12*4 + 8 + 16*4, $this->getRates(19,23,4));
        $this->AssertEquals(64, $this->getRates(18,22,24));
        $this->AssertEquals(4*16, $this->getRates(24,1,4));
        $this->AssertEquals(3*16, $this->getRates(1,2,4));
        $this->AssertEquals(2*8, $this->getRates(17,17,19));
        $this->AssertEquals(12 + 8, $this->getRates(22,23,24));
        $this->AssertEquals(2*12 + 4*16, $this->getRates(22,1,4));
        $this->AssertNotEquals(1000, $this->getRates(17,2,4));
    }
}