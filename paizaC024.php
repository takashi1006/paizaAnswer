<?php

    $firstLine = 3;

    $inData = [
        'SET 1 10',
        'SET 2 20',
        'ADD 40',
    ];

    $firstLine = 3;

    $inData = [
        'SET 1 -23',
        'SUB 77',
        'SET 1 0',
    ];

    // $firstLine = trim(fgets(STDIN);

    $data = [];
    for ($i=0; $i < $firstLine; $i++) { 
        // $s = trim(fgets(STDIN));
        // $s = str_replace(array("\r\n","\r","\n"), '', $s);
        $dataArray = explode(' ', $inData[$i]);
        $data[] = [
            'command' => $dataArray[0] ?? null,
            'number1' => $dataArray[1] ?? null,
            'number2' => $dataArray[2] ?? null,
        ];
    }

    $answerArray = [
        1 => 0,
        2 => 0,
    ];

    foreach ($data as $key => $value) {
        print_r($value);
        if ($value['command'] === 'SET') {
            $answerArray[$value['number1']] = $value['number2'];
        } elseif ($value['command'] === 'ADD') {
            $answerArray[2] = $answerArray[1] + $value['number1'];
        } elseif ($value['command'] === 'SUB') {
            $answerArray[2] = $answerArray[1] - $value['number1'];
        }
        print_r($answerArray);
    }

    $answer = '';
    for ($i=1; $i < 3; $i++) {
        $answer .= $answerArray[$i] . ' ';
    }

    echo $answer;


























