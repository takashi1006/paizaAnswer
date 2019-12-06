<?php


// echo 'Hello world' . PHP_EOL;


$foreachData = [
    1,
    2,
    3,
];



foreach ($foreachData as $key => $value) {
    // echo $value . PHP_EOL;
    $value++;
}
// foreach ($foreachData as $key => &$value) {
//     // echo $value . PHP_EOL;
//     $value++;
// }

echo "<pre>";
print_r($foreachData);
echo "</pre>";

$forData = [
    1,
    2,
    3,
];

for ($i = 0; $i < count($forData); $i++) {
    // echo $data[$i] . PHP_EOL;
    $forData[$i]++;
}

echo "<pre>";
print_r($forData);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ul>
        <li>HTML</li>
        <li>CSS</li>
        <li style="color: red;">bootstrap(CSSのライブラリー)</li>
        <li>JavaScript</li>
        <li style="color: red;">JQuery(JavaScriptのライブラリー)</li>
    </ul>
    <h3>PHP</h3>
    <h4>Wordpress</h4>
    <ul>
        <li>レンタルサーバー</li>
        <li>wordpressインストール</li>
        <li>ドメイン購入・設定</li>
        <li>wordpressログイン・カスタマイズ</li>
    </ul>
</body>

</html>