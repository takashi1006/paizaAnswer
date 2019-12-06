<?php


    $firstLine = '5 5';

    $data = [
        '1 2',
        '3 4',
    ];


    $firstLine = '5 7';

    $data = [
        '1 5',
        '-2 1',
    ];
    $firstLine = trim(fgets(STDIN));
    $data = [];
    for ($i = 0; $i < 2; $i++) {
      $s = trim(fgets(STDIN));
      $data[] = str_replace(array("\r\n","\r","\n"), '', $s);
    //   $data[] = explode(" ", $s);
    //   echo "hello = ".$s[0]." , world = ".$s[1]."\n";
    }


    // var_dump($data);
    
    list($height, $width) = explode(' ', $firstLine);
    
    $table = [];
    
    for ($i=0; $i < $height ; $i++) { 
        $row = [];
        for ($j=0; $j < $width ; $j++) { 
            $row[$j] = 0;
        }
        $table[$i] = $row;
    }
    
    foreach ($data as $key => $value) {
        list($first, $second) = explode(' ', $value);
        $table[$key][0] = $first;
        $table[$key][1] = $second;
    }
    
    
    for ($i=0; $i < count($table); $i++) {
        $widthDifference = $table[$i][1] - $table[$i][0];
        for ($j=2; $j <count($table[$i]) ; $j++) {
            $table[$i][$j] = $table[$i][$j-1] + $widthDifference;
        }
    }
    $heightDifference = [];
    for ($i=0; $i < count($table[1]); $i++) { 
        $heightDifference[$i] = $table[1][$i] - $table[0][$i];
    }
    
    for ($i=2; $i < count($table); $i++) {
        for ($j=0; $j < count($table[$i]); $j++) { 
            $table[$i][$j] = $table[$i - 1][$j] + $heightDifference[$j];
        }
    }
    
    $answer = '';
    foreach ($table as $row) {
        foreach ($row as $key => $value) {
            if ($key !== 0) {
                $answer .= ' ';
            }
            $answer .= $value;
        }
        $answer .= PHP_EOL;
    }
    
    echo $answer;


