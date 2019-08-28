<?php


class Babysitter
{
    private $startTime;
    private $endTime;
    private $bedTime;

    public function setStartTime($startTime)
    {
        $this->startTime = (int) $startTime;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function setEndTime($endTime)
    {
        $this->endTime = (int) $endTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function setBedTime($bedTime)
    {
        $this->bedTime = (int) $bedTime;
    }

    public function getBedTime()
    {
        return $this->bedTime;
    }

}

?>
