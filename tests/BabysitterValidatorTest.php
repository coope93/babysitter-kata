<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../BabysitterValidator.php";


class BabysitterValidatorTest extends TestCase
{
    public function testTestInvalidStartTime()
    {
        $babySitterValidator = new BabysitterValidator();
        $this->AssertFalse($babySitterValidator->isValidStartTime(-1));
        $this->AssertFalse($babySitterValidator->isValidStartTime(0));
        $this->AssertTrue($babySitterValidator->isValidStartTime(1));
        $this->AssertTrue($babySitterValidator->isValidStartTime(2));
        $this->AssertTrue($babySitterValidator->isValidStartTime(3));
        $this->AssertTrue($babySitterValidator->isValidStartTime(4));
        $this->AssertFalse($babySitterValidator->isValidStartTime(5));
        $this->AssertFalse($babySitterValidator->isValidStartTime(6));
        $this->AssertFalse($babySitterValidator->isValidStartTime(7));
        $this->AssertFalse($babySitterValidator->isValidStartTime(8));
        $this->AssertFalse($babySitterValidator->isValidStartTime(9));
        $this->AssertFalse($babySitterValidator->isValidStartTime(10));
        $this->AssertFalse($babySitterValidator->isValidStartTime(11));
        $this->AssertFalse($babySitterValidator->isValidStartTime(12));
        $this->AssertFalse($babySitterValidator->isValidStartTime(16));
        $this->AssertTrue($babySitterValidator->isValidStartTime(17));
        $this->AssertTrue($babySitterValidator->isValidStartTime(18));
        $this->AssertTrue($babySitterValidator->isValidStartTime(19));
        $this->AssertTrue($babySitterValidator->isValidStartTime(20));
        $this->AssertTrue($babySitterValidator->isValidStartTime(21));
        $this->AssertTrue($babySitterValidator->isValidStartTime(22));
        $this->AssertTrue($babySitterValidator->isValidStartTime(23));
        $this->AssertTrue($babySitterValidator->isValidStartTime(24));
        $this->AssertFalse($babySitterValidator->isValidStartTime(25));

        $this->AssertFalse($babySitterValidator->isValidStartTime('17:50'));
        $this->AssertFalse($babySitterValidator->isValidStartTime('17:00'));

        $this->AssertFalse($babySitterValidator->isValidStartTime('This is a string'));
        $this->AssertFalse($babySitterValidator->isValidStartTime(':'));
    }

    public function testIsValidEndTime()
    {
        $babySitterValidator = new BabysitterValidator();
        $this->AssertTrue($babySitterValidator->isValidEndTime('17', '4'));
        $this->AssertTrue($babySitterValidator->isValidEndTime(17, 4));
        $this->AssertTrue($babySitterValidator->isValidEndTime(1, 4));
        $this->AssertTrue($babySitterValidator->isValidEndTime(0, 4));
        $this->AssertTrue($babySitterValidator->isValidEndTime(0, 1));
        $this->AssertTrue($babySitterValidator->isValidEndTime(19, 24));
        $this->AssertTrue($babySitterValidator->isValidEndTime(24, 4));
        $this->AssertTrue($babySitterValidator->isValidEndTime(18, 3));
        $this->AssertFalse($babySitterValidator->isValidEndTime(3, 19));
        $this->AssertFalse($babySitterValidator->isValidEndTime(18, 5));
        $this->AssertFalse($babySitterValidator->isValidEndTime(0, 5));
        $this->AssertFalse($babySitterValidator->isValidEndTime(18, 8));
        $this->AssertFalse($babySitterValidator->isValidEndTime('17:01', '4:00'));
        $this->AssertFalse($babySitterValidator->isValidEndTime('Blah', 'Blah'));
    }

    public function testValidateBedTime() {
        $babySitterValidator = new BabysitterValidator();
        $this->AssertTrue($babySitterValidator->isValidBedTime(17,19,4));
        $this->AssertTrue($babySitterValidator->isValidBedTime(18,24,2));
        $this->AssertTrue($babySitterValidator->isValidBedTime(19,21,24));
        $this->AssertTrue($babySitterValidator->isValidBedTime(2,3,4));
        $this->AssertTrue($babySitterValidator->isValidBedTime(18,1,4));
        $this->AssertFalse($babySitterValidator->isValidBedTime(21,24,19));
        $this->AssertFalse($babySitterValidator->isValidBedTime(17,20,19));
        $this->AssertFalse($babySitterValidator->isValidBedTime(21,20,19));
    }


}