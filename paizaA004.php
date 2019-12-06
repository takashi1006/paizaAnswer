<?php


$data = [
    '7 4 5',
    '1 3 1',
    '3 2 2',
    '2 3 5',
    '3 4 4',
    '1 6 6',
];

// $data = [
//     '5 5 8',
//     '3 3 4',
//     '1 3 2',
//     '4 2 2',
//     '2 1 2',
//     '2 4 4',
//     '3 1 1',
//     '1 4 3',
//     '4 3 4',
// ];

// 縦線の長さ
$verticalLineLength = 0;
// 縦線の本数
$verticalLineNumber = 0;
// 横線の本数
$horizontalLineNumber = 0;

// 横線
$horizontalLine = [];

// paizaで入力を取得する
// $input_line = trim(fgets(STDIN));
// $input_line_trim = str_replace(array("\r\n", "\r", "\n"), '', $input_line);
// $valueExplode = explode(' ', $input_line_trim);
// $verticalLineLength = $valueExplode[0];
// $verticalLineNumber = $valueExplode[1];
// $horizontalLineNumber = $valueExplode[2];
// for ($i = 0; $i < $horizontalLineNumber; $i++) {
//     $s = trim(fgets(STDIN));
//     $s = str_replace(array("\r\n", "\r", "\n"), '', $s);
//     $s = explode(" ", $s);
//     $horizontalLine[] = [
//         'startHorizontalLineNumber' => $s[0],
//         'startHorizontalLineLength' => $s[1],
//         'endHorizontalLineNumber' => $s[0] + 1,
//         'endHorizontalLineLength' => $s[2],
//     ];
// }


// データを変数に保存
foreach ($data as $key => $value) {
    $valueExplode = explode(' ', $value);
    if ($key === 0) {
        $verticalLineLength = $valueExplode[0];
        $verticalLineNumber = $valueExplode[1];
        $horizontalLineNumber = $valueExplode[2];
    } else {
        // 横線の情報
        $horizontalLine[] = [
            'startHorizontalLineNumber' => $valueExplode[0],
            'startHorizontalLineLength' => $valueExplode[1],
            'endHorizontalLineNumber' => $valueExplode[0] + 1,
            'endHorizontalLineLength' => $valueExplode[2],
        ];
    }
}


// 縦線
$verticalLine = [];
// くじ
$lottery = [];

// 縦線の作成
for ($i=1; $i < $verticalLineLength + 1; $i++) { 
    $verticalLine[$i] = [];
}

// 横線がないあみだくじの配列を作成
for ($i=1; $i < $verticalLineNumber + 1; $i++) { 
    $lottery[$i] = $verticalLine;
}

// 各横線を同じ数値でマッピングしていく
foreach ($horizontalLine as $key => $value) {
    $lottery[$value['startHorizontalLineNumber']][$value['startHorizontalLineLength']] = $key;
    $lottery[$value['endHorizontalLineNumber']][$value['endHorizontalLineLength']] = $key;
}


$answer = 0;;
for ($i=1; $i < $verticalLineNumber + 1; $i++) {
    // 各横線を上から動かしていく 
    $goal = movePoint($lottery, $i, 1, $verticalLineLength);
    // 1の場合出力する
    if ($goal === 1) {
        $answer = $i;
    }
}

/**
 * あみだくじを動かしていく
 * 
 * @param array $lottery
 * @param int   $verticalLineNumber
 * @param int   $startVerticalLineLength
 * @param int   $verticalLineLength
 * 
 * @return int 縦線の数字
 */
function movePoint($lottery, $verticalLineNumber, $startVerticalLineLength, $verticalLineLength)
{
    // startする縦線と高さを指定して動かす
    for ($i=$startVerticalLineLength; $i < $verticalLineLength; $i++) {
        if (!is_array($lottery[$verticalLineNumber][$i])) {
            // 横線がある場合、移動する場所(高さ)を取得する
            $moveLineLength = getBranchMovePoint($lottery, $lottery[$verticalLineNumber][$i], $verticalLineNumber + 1);
            // nullの場合左側の縦線に移動箇所がある
            if ($moveLineLength === null) {
                // 横線がある場合、移動する場所(高さ)を取得する
                $moveLineLength = getBranchMovePoint($lottery, $lottery[$verticalLineNumber][$i], $verticalLineNumber - 1);
                // 左側の縦線で取得した高さから移動を始める
                return movePoint($lottery, $verticalLineNumber - 1, $moveLineLength + 1, $verticalLineLength);
            } else {
                // 右側の縦線で取得した高さから移動を始める
                return movePoint($lottery, $verticalLineNumber + 1, $moveLineLength + 1, $verticalLineLength);
            }
        }
    }
    return $verticalLineNumber;
}

/**
 * 横線の移動場所を探す
 * 
 * @param array $lottery
 * @param int   $startNumber
 * @param int   $verticalLineNumber
 * 
 * @return int null or 高さ
 */
function getBranchMovePoint($lottery, $startNumber, $verticalLineNumber)
{
    // 移動する高さ
    $moveLineLength = null;
    // 横線がない場合はnullを返す
    if (!isset($lottery[$verticalLineNumber])) {
        return $moveLineLength;
    }
    // 横線がある場合
    foreach ($lottery[$verticalLineNumber] as $key => $value) {
        // 同じ移動箇所を探す
        if ($startNumber == $value) {
            $moveLineLength = $key;
        }
    }
    return $moveLineLength;
}













