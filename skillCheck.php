<?php


/**
 * 第1問
 * 
 * 1ヶ月あたりの給与にボーナス計算のための係数を掛け算したボーナスの額を出力してください。
 */

// [1ヶ月あたりの給与 係数]
$data = [
    'A' => '250000 3',
    'B' => '280000 2',
    'C' => '340000 5',
];

foreach ($data as $name => $value) {
    list($salary, $coefficient) = explode(' ', $value);
    // 出力
    echo ($name . 'くんのボーナスは' . $salary * $coefficient . '円です。<br>');
}

echo ('<br>');

/**
 * 第2問
 * 
 * 1からnまでの1ずつ増加する数列の和を出力してください。
 */

// [n]
$data = [
    '26',
    '198',
    '88',
];

foreach ($data as $value) {
    $totalNumber = 0;
    for ($i=1; $i < $value; $i++) { 
        $totalNumber += $i;
    }
    // 出力
    echo('1~' . $value . 'までの総和は' . $totalNumber . 'です。<br>');
}

echo ('<br>');

/**
 * 第3問
 * 
 * 嫌いな数字が入っていない病室番号を入力された順番を崩すことなくすべて出力してください。
 * もし希望する部屋が1つもなければ"none" と出力してください。
 */

// [嫌いな数字] => [
//    各病室番号
// ]
$data = [
    '4' => [
        '101',
        '204',
        '301',
        '401',
        '501',
    ],
    '9' => [
        '409',
        '509',
        '109',
    ],
    '1' => [
        '101',
        '102',
        '205',
        '224',
        '231',
        '314',
    ],
];

foreach ($data as $hateNumber => $roomArray) {
    echo('嫌いな数字: ' . $hateNumber . '<br>');
    $room = [];
    foreach ($roomArray as $roomNumber) {
        if (strpos($roomNumber, (string)$hateNumber) === false) {
            // 出力
            $room[] = $roomNumber;
        }
    }
    if (count($room) === 0) {
        echo('泊まりたい病室はありません' . '<br>');
    } else {
        echo('泊まりたい病室は' . '<br>');
        foreach ($room as  $value) {
            echo($value . '<br>');
        }
        echo('です。' . '<br>');
    }
}

echo ('<br>');

/**
 * 第4問
 * 入力されたデータの画素数を判断し置換する。。
 * ・画素値が 128 以上 : 1 (白)
 * ・画素値が 127 以下 : 0 (黒)
 * ・画素値が 256 以上 0 未満 : null
 */

// [
//  "R" => 画素数,
//  "G" => 画素数,
//  "B" => 画素数,
// ]
$data = [
    [
        'R' => 127,
        'G' => 127,
        'B' => 127,
    ],
    [
        'R' => 128,
        'G' => 127,
        'B' => 128,
    ],
    [
        'R' => 128,
        'G' => -1,
        'B' => 127,
    ],
    [
        'R' => 256,
        'G' => 128,
        'B' => 0,
    ],
];

$keys = ['R', 'G', 'B'];
$createData = [];
foreach ($data as $key => $rgb) {
    foreach ($keys as $value) {
        if ($rgb[$value] >= 256 || $rgb[$value] < 0) {
            $createData[$key][$value] = null;
        } elseif ($rgb[$value] >= 128) {
            $createData[$key][$value] = 1;
        } else {
            $createData[$key][$value] = 0;
        }
    }
}

// 出力
echo('<pre>');
print_r($createData);
echo('</pre>');
