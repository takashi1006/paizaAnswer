<?php


    $translateMultiple =[
        'es' => [
            's',
            'sh',
            'ch',
            'o',
            'x',
        ],
        'ves' => [
            'f',
            'fe',
        ],
        'ies' => [
            'y',
        ],
        's' => [
            '*',
        ],
    ];

    $translateCondistions =[
        'ies' => [
            'except' => [
                'a',
                'i',
                'u',
                'e',
                'o'
            ],
        ],
    ];

    $firstLine = '3';

    $inData = [
        'dog',
        'cat',
        'pig',
    ];

    $firstLine = '7';

    $inData = [
        'box',
        'photo',
        'axis',
        'dish',
        'church',
        'leaf',
        'knife',
    ];

    $firstLine = '2';

    $inData = [
        'study',
        'play',
    ];

    // 問題数
    // $count = trim(fgets(STDIN));
    $count = $firstLine;
    // 回答
    $answerArray = [];
    for ($i = 0; $i < $count; $i++) {
        // $s = trim(fgets(STDIN));
        // $s = str_replace(array("\r\n","\r","\n"), '', $s);
        // $answerArray[] = $s;
        $answerArray[] = translate($translateMultiple, $translateCondistions, $inData[$i]);
    }

    function translate(array $translateMultiple, array $translateCondistions, string $string) : string
    {
        $last1 = substr($string, -1);
        $last2 = substr($string, -2);
        $answer = '';
        if (array_search($last1, $translateMultiple['es']) !== false || array_search($last2, $translateMultiple['es']) !== false) {
            return $string . 'es';
        } elseif (array_search($last2, $translateMultiple['ves']) !== false) {
            $stringTmp = substr($string, 0, strlen($string) - 2);
            return $stringTmp . 'ves';
        } elseif (array_search($last1, $translateMultiple['ves']) !== false) {
            $stringTmp = substr($string, 0, strlen($string) - 1);
            return $stringTmp . 'ves';
        } elseif (array_search($last1, $translateMultiple['ies']) !== false) {
            $findLast2 = substr($string, strlen($string) - 2, 1);
            if (array_search($findLast2, $translateCondistions['ies']['except']) !== false) {
                return $string . 's';
            } else {
                $stringTmp = substr($string, 0, strlen($string) - 1);
                return $stringTmp . 'ies';
            }
        } else {
            return $string . 's';
        }
        return $answer;
    }

    $answer = '';
    foreach ($answerArray as $row) {
        $answer .= $row . PHP_EOL;
    }
    
    echo $answer;


