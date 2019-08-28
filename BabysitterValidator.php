<?php

class BabysitterValidator
{
    const START_EVENING = 17;
    const END_MORNING = 4;
    const MIDNIGHT = 24;

    /**
     * @param $startTime
     * @return bool
     *  Validate the start time
     */
    public function isValidStartTime($startTime)
    {
        return $this->isValidNumber($startTime);
    }

    /**
     * @param $startTime
     * @param $endTime
     * @return bool
     *  Validate the baby sitting end time
     */
    public function isValidEndTime($startTime, $endTime)
    {
        if (!$this->isValidNumber($endTime)) {
            return false;
        }

        $startTime = $this->convertNumberRange($startTime);
        $endTime = $this->convertNumberRange($endTime);

        if ($startTime > $endTime) {
            return false;
        }

        return true;

    }

    /**
     * @param $startTime
     * @param $bedTime
     * @param $endTime
     * @return bool
     *  Validate the bed time
     */
    public function isValidBedTime($startTime, $bedTime, $endTime)
    {
        if (!$this->isValidNumber($bedTime)) {
            return false;
        }

        $startTime = $this->convertNumberRange($startTime);
        $bedTime = $this->convertNumberRange($bedTime);
        $endTime = $this->convertNumberRange($endTime);


        if($startTime <= $bedTime
            && $endTime >= $bedTime) {
            return true;
        }

        return false;

    }

    /**
     * @param $number
     * @return int
     * Convert time to sequential numbers for easier comparison
     */
    private function convertNumberRange($number) {

        if($number <= BabysitterValidator::END_MORNING) {
            return $number + BabysitterValidator::MIDNIGHT;
        }

        return $number;
    }

    /**
     * @param $time
     * @return bool
     * Validate input type and valid ranges
     */
    private function isValidNumber($time)
    {
        // Check if input is an int
        if (!is_int($time)) {
            echo 'not int '.$time;
            // Check if input is a valid int
            if(!ctype_digit($time)) {
                echo 'digit' . $time;
                return false;
            }

            $time = (int) $time;
        }

        // Check that hour is in range for babysitting
        if ($time < BabysitterValidator::START_EVENING
            && $time > BabysitterValidator::END_MORNING
            || $time > BabysitterValidator::MIDNIGHT
            || $time <= 0) {
            return false;
        }

        return true;
    }

}