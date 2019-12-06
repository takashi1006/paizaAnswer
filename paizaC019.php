<?php

    $firstLine = 3;

    $inData = [
        28,
        16,
        777,
    ];

    $firstLine = 4;

    $inData = [
        3,
        4,
        5,
        6,
    ];

    // $firstLine = trim(fgets(STDIN);

    $answerArray = [];
    for ($i=0; $i < $firstLine; $i++) { 
        // $s = trim(fgets(STDIN));
        // $s = str_replace(array("\r\n","\r","\n"), '', $s);
        $s = $inData[$i];
        $answerArray[] = perfectNumber($s);
    }

    function perfectNumber(int $number) : string
    {
        $divisor = [];
        for ($i=1; $i < $number; $i++) {
            if ($number % $i === 0 ) {
                $divisor[] = $i;
            } 
        }
        $total = 0;
        foreach ($divisor as $value) {
            $total += $value;
        }
        if ($number === $total) {
            $answer = 'perfect';
        } elseif (abs($number - $total) === 1) {
            $answer = 'nearly';
        } else {
            $answer = 'neither';
        }
        return $answer;
    }

    $answer = '';
    foreach ($answerArray as $row) {
        $answer .= $row . PHP_EOL;
    }

    echo $answer;


























