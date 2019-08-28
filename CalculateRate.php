<?php


class CalculateRate
{
    const TIL_BED_TIME = 12;
    const BED_TIME_TIL_MIDNIGHT = 8;
    const MIDNIGHT_TIL_MORNING = 16;

    private $startTime;
    private $endTime;
    private $bedTime;

    private $totalCharge = 0;

    public function __construct($startTime, $bedTime, $endTime)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->bedTime = $bedTime;

        $this->setTotalCharge(
            $this->calculateTilBedtime()
            + $this->calculateBedTimeTilMidnight()
            + $this->calculateMidnightTilMorning()
        );
    }

    /**
     * @return float|int
     */
    private function calculateTilBedtime()
    {
        if ($this->startTime < 24 && $this->startTime >= 17) {
            if ($this->bedTime >= 17) {
                return ($this->bedTime - $this->startTime) * CalculateRate::TIL_BED_TIME;
            }

            // If bed time is after midnight charge the "til bedtime" rate until midnight
            return (24 - $this->startTime) * CalculateRate::TIL_BED_TIME;
        }

        return 0;
    }

    /**
     * @return float|int
     */
    private function calculateBedTimeTilMidnight()
    {
        if ($this->bedTime < 24 && $this->bedTime >= 17) {
            if ($this->endTime <= 4) {
                return (24 - $this->bedTime) * CalculateRate::BED_TIME_TIL_MIDNIGHT;
            }

            // If they are not out past midnight
            return ($this->endTime - $this->bedTime) * CalculateRate::BED_TIME_TIL_MIDNIGHT;
        }

        return 0;
    }

    /**
     * @return float|int
     */
    private function calculateMidnightTilMorning()
    {
        if ($this->endTime <= 4) {
            if ($this->startTime >= 17) {
                return $this->endTime * CalculateRate::MIDNIGHT_TIL_MORNING;
            }

            if ($this->bedTime <= 4 && $this->startTime >= 17) {
                return $this->endTime * CalculateRate::MIDNIGHT_TIL_MORNING;
            }
            // in case babysitting started past midnight
            return ($this->endTime - $this->startTime) * CalculateRate::MIDNIGHT_TIL_MORNING;
        }

        return 0;
    }

    /**
     * @param $totalCharge
     */
    public function setTotalCharge($totalCharge)
    {
        $this->totalCharge = $totalCharge;
    }

    /**
     * @return int
     */
    public function getTotalCharge()
    {
        return $this->totalCharge;
    }



}