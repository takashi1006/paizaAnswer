<?php

// 1行目
$input_line_trim = '6 11';

// 重り
$dataArray = [
    2,
    2,
    3,
    3,
    3,
    4,
];

// 重りの数と適切な重さ
list($weightNumber, $bestWeight) = explode(' ', $input_line_trim);

$weight = [];
for ($i=0; $i < $weightNumber; $i++) { 
    $weight[] = $dataArray[$i];
}

$leftSideWeight = getLeftSideWeight($weight, 2, $bestWeight, 0, []);



var_dump($leftSideWeight);



function getLeftSideWeight($weightArray, $selectionNumber, $bestWeight, $weight ,$selectWeightNumberArray)
{
    $returnWeight = $weight;
    $returnselectNumberArray = [];
    for ($i = 0; $i < count($weightArray); $i++) {
        $selectArray = [];
        $getWeight = 0;
        if (!array_search($i, $selectWeightNumberArray) && !array_search($i, $selectArray)) {
            if ($bestWeight / 2 > $weight + $weightArray[$i]) {
                $getWeight = $weight + $weightArray[$i];
                $selectArray[] = $i;
            }
            if ((count($selectWeightNumberArray) + count($selectArray)) < $selectionNumber) {
                list($getWeight, $selectArray) = getLeftSideWeight($weightArray, $selectionNumber, $bestWeight, $getWeight, array_merge($selectWeightNumberArray, $selectArray));
            }
            if ($getWeight > $returnWeight && (count($selectWeightNumberArray) + count($selectArray)) === $selectionNumber) {
                $returnWeight = $getWeight;
                $returnselectNumberArray[] = array_merge($selectWeightNumberArray, $selectArray);
            }
        }
    }
    return [$returnWeight, $selectArray];
}


