<?php


    $firstLine = '7 10 4';

    $inData = [
        '1 8 1',
        '4 1 5',
        '1 6 2',
        '2 2 0',
    ];

    $firstLine = '10 10 9';

    $inData = [
        '2 2 4',
        '2 2 3',
        '2 2 5',
        '2 2 2',
        '2 2 6',
        '2 2 1',
        '2 2 7',
        '2 2 0',
        '2 2 8',
    ];

    // 高さ、横幅、箱の数
    list($height, $width, $boxCount) = explode(' ', $firstLine);
    // list($height, $width, $boxCount) = explode(' ', trim(fgets(STDIN)));
    // 落ちてくる箱のデータ
    $box = [];
    for ($i = 0; $i < $boxCount; $i++) {
        // $s = trim(fgets(STDIN));
        // $s = str_replace(array("\r\n","\r","\n"), '', $s);
        // $data = explode(" ", $s);
        $data = explode(" ", $inData[$i]);
        $boxData = [];
        // 箱の高さ
        $boxData['boxHeight'] = $data[0];
        // 箱の横幅
        $boxData['boxWidth'] = $data[1];
        // 箱の左からの場所
        $boxData['boxLeft'] = $data[2];
        $box[] = $boxData;
    }

    // ゲームの画面
    $game = [];

    for ($i=0; $i < $height; $i++) { 
        $row = [];
        for ($j=0; $j < $width; $j++) { 
            $row[] = '.';
        }
        $game[] = $row;
    }

    foreach ($box as $value) {
        for ($i=0; $i < $height; $i++) {
            for ($j = $i; $j < $value['boxHeight'] + $i; $j++) {
                for ($k = $value['boxLeft']; $k < $value['boxLeft'] + $value['boxWidth']; $k++) {
                    $game[$j][$k] = '#';
                }
            }

            // 落ちれるか判定
            $isDown = isDown($game, $value, $i);
            if (!$isDown) {
                break;
            }

            // 下に行くために消去
            for ($j = 0; $j < $value['boxHeight'] + $i; $j++) {
                for ($k = $value['boxLeft']; $k < $value['boxLeft'] + $value['boxWidth']; $k++) {
                    $game[$j][$k] = '.';
                }
            }
        }
    }


    function isDown($game, $boxData, $downCount)
    {
        if (!isset($game[$boxData['boxHeight'] + $downCount])) {
            return false;
        }
        $isFind = true;

        $findRow = $game[$boxData['boxHeight'] + $downCount];
        for ($i=$boxData['boxLeft']; $i < $boxData['boxLeft'] + $boxData['boxWidth']; $i++) { 
            if ($findRow[$i] == '#') {
                $isFind = false;
            }
        }
        return $isFind;
    }
    
    $answer = '';
    foreach ($game as $row) {
        foreach ($row as $key => $value) {
            $answer .= $value;
        }
        $answer .= PHP_EOL;
    }
    
    echo $answer;


