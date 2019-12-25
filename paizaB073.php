<?php

    $firstLine = '5 6';
    $secondLine = '4 3 6 1 3';
    $findLineCount = 3;
    $firstLine = '10 1';
    $secondLine = '3 3 7 3 7 5 8 3 5 3';
    $findLineCount = 5;

    $firstLine = str_replace(["\r\n","\r","\n"], '', trim(fgets(STDIN)));
    list($treeCount, $averageLightCount) = explode(' ', $firstLine);
    $secondLine = str_replace(["\r\n","\r","\n"], '', trim(fgets(STDIN)));
    $treeLightCount = explode(' ', $secondLine);
    $findLineCount = str_replace(["\r\n","\r","\n"], '', trim(fgets(STDIN)));
    $findLine = [];
    for ($i = 0; $i < $findLineCount; $i++) {
        $s = trim(fgets(STDIN));
        $s = str_replace(["\r\n","\r","\n"], '', $s);
        list($startLine, $endLine) = explode(' ', $s);
        $findLine[] = [
            'startLine' => $startLine,
            'endLine' => $endLine,
        ];
    }
    // $findLine = [
    //     [
    //         'startLine' => 1,
    //         'endLine' => 3,
    //     ],
    //     [
    //         'startLine' => 1,
    //         'endLine' => 5,
    //     ],
    //     [
    //         'startLine' => 2,
    //         'endLine' => 3,
    //     ],
    // ];
    // $findLine = [
    //     [
    //         'startLine' => 1,
    //         'endLine' => 7,
    //     ],
    //     [
    //         'startLine' => 6,
    //         'endLine' => 9,
    //     ],
    //     [
    //         'startLine' => 5,
    //         'endLine' => 7,
    //     ],
    //     [
    //         'startLine' => 1,
    //         'endLine' => 2,
    //     ],
    //     [
    //         'startLine' => 4,
    //         'endLine' => 8,
    //     ],
    // ];


    foreach ($findLine as $key => $value) {
        $total = 0;
        for ($i=$value['startLine'] - 1; $i < $value['endLine']; $i++) { 
            $total += $treeLightCount[$i];
        }
        $average = floor($total / ($value['endLine'] - $value['startLine'] + 1));

        
        $addLightCount = $average - $averageLightCount;
        if ($addLightCount < 0) {
            for ($i=$value['startLine'] - 1; $i < $value['endLine']; $i++) { 
                $treeLightCount[$i] += abs($addLightCount);
            }
        }
    }

    foreach ($treeLightCount as $key => $value) {
        if ($key !== 0) {
            echo ' ';
        }
        echo $value;
    }

