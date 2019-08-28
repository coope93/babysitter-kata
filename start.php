<?php
    require __DIR__ . "/Babysitter.php";
    require __DIR__ . "/BabysitterValidator.php";
    require __DIR__ . "/CalculateRate.php";

    $babysitter = new Babysitter();
    $validator = new BabysitterValidator();

    // Get start time
    echo 'What time does babysitting start (Please provide in 24 hour time)? ';
    $babysitter->setStartTime(fgets(STDIN));

    while (!$validator->isValidStartTime($babysitter->getStartTime())) {
        echo 'Sorry, invalid start time. Please enter start time again: ';
        $babysitter->setStartTime(fgets(STDIN));
    }

    // Get babysitting end time
    echo 'What time does babysitting end (Please provide in 24 hour time)? ';
    $babysitter->setEndTime(fgets(STDIN));

    while (
        !$validator->isValidEndTime(
            $babysitter->getStartTime(),
            $babysitter->getEndTime()
        )
    ) {
        echo 'Sorry, invalid end time. Please enter end time again: ';
        $babysitter->setEndTime(fgets(STDIN));
    }


    // Get bed time
    echo 'What time is bed time (Please provide in 24 hour time)? ';
    $babysitter->setBedTime(fgets(STDIN));

    while (
        !$validator->isValidBedTime(
            $babysitter->getStartTime(),
            $babysitter->getBedTime(),
            $babysitter->getEndTime()
        )
    ) {
        echo 'Sorry, invalid bed time. Please enter bed time again: ';
        $babysitter->setBedTime(fgets(STDIN));
    }

    // Calculate Total Rate
    $rates = new CalculateRate(
        $babysitter->getStartTime(),
        $babysitter->getBedTime(),
        $babysitter->getEndTime()
    );

    echo 'The total rate is $'.$rates->getTotalCharge().'.';

?>