<?php

    $firstLine = '5 25';

    $inData = [
        '80 11',
        '20 1',
        '50 2',
        '70 0',
        '25 1',
    ];

    $firstLine = '5 0';

    $inData = [
        '70 4',
        '30 7',
        '60 1',
        '15 7',
        '80 3',
    ];
    $firstLine = '10 60';

    $inData = [
        '85 3',
        '85 7',
        '65 1',
        '85 5',
        '90 0',
        '35 14',
        '10 1',
        '75 1',
        '25 3',
        '70 5',
    ];

    // $firstLine = trim(fgets(STDIN);
    list($count, $passScore) = explode(' ', $firstLine);

    $data = [];
    for ($i=0; $i < $count; $i++) { 
        // $s = trim(fgets(STDIN));
        // $s = str_replace(array("\r\n","\r","\n"), '', $s);
        $dataArray = explode(' ', $inData[$i]);
        $data[] = [
            'score' => $dataArray[0] ?? null,
            'absence' => $dataArray[1] ?? null,
        ];
    }

    // print_r($data);

    $answerArray = [];
    foreach ($data as $key => $value) {
        $score = $value['score'] - ($value['absence'] * 5);
        if ($score < 0) {
            $score = 0;
        }
        // print_r($score . PHP_EOL);
        if ($score >= $passScore) {
            $answerArray[] = $key + 1;
        }
    }

    $answer = '';
    foreach ($answerArray as $key => $value) {
        $answer .= $value . PHP_EOL;
    }

    echo $answer;


























