<?php

    $distance = '6';

    $secondLine = '2 2 5';

    $turtle = '4';

    $distance = '6';

    $secondLine = '2 1 3';

    $turtle = '4';

    // $distance = '1000';

    // $secondLine = '1 1 1000';

    // $turtle = '1000';

    $distance = str_replace(["\r\n","\r","\n"], '', trim(fgets(STDIN)));
    $secondLine = str_replace(["\r\n","\r","\n"], '', trim(fgets(STDIN)));
    $turtle = str_replace(["\r\n","\r","\n"], '', trim(fgets(STDIN)));

    list($rabit, $restDistance, $restTime) = explode(" ", $secondLine);

    function getTimeRabit($distance, $rabit, $restDistance, $restTime) :float
    {
        $restCount = 0;
        if ($distance % $restDistance === 0) {
            $restCount = floor(($distance / $restDistance)) - 1;
        } else {
            $restCount = floor($distance / $restDistance);
        }
        $useRabitRestTime = $restCount * $restTime;
        $useRabitTime = ($distance * $rabit) + $useRabitRestTime;
        return $useRabitTime;
    }
    function getTimeTurtle($distance, $turtle) :float
    {
        $useTurtleTime = $distance * $turtle;
        return $useTurtleTime;
    }

    $useRabitTime = getTimeRabit($distance, $rabit, $restDistance, $restTime);
    $useTurtleTime = getTimeTurtle($distance, $turtle);
    if ($useRabitTime > $useTurtleTime) {
        echo 'KAME';
    } elseif($useRabitTime < $useTurtleTime) {
        echo 'USAGI';
    } else {
        echo 'DRAW';
    }


























