<?php

// let str = 'http://yahoo.co.jp?keyword=デコード&category=1';
// let str = '<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg/embed?start=false&loop=false&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>';
// js
// console.log(escape(str));
// console.log(encodeURI(str));
// console.log(encodeURIComponent(str));


$escapeStr = "http%3A//yahoo.co.jp%3Fkeyword%3D%u30C7%u30B3%u30FC%u30C9%26category%3D1";
$encodeURIStr = "http://yahoo.co.jp?keyword=%E3%83%87%E3%82%B3%E3%83%BC%E3%83%89&category=1";
$encodeURIComponentStr = "http%3A%2F%2Fyahoo.co.jp%3Fkeyword%3D%E3%83%87%E3%82%B3%E3%83%BC%E3%83%89%26category%3D1";

$escapeStr = "%3Ciframe%20src%3D%22https%3A//docs.google.com/presentation/d/e/2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg/embed%3Fstart%3Dfalse%26loop%3Dfalse%26delayms%3D3000%22%20frameborder%3D%220%22%20width%3D%22960%22%20height%3D%22569%22%20allowfullscreen%3D%22true%22%20mozallowfullscreen%3D%22true%22%20webkitallowfullscreen%3D%22true%22%3E%3C/iframe%3E";
$encodeURIStr = "%3Ciframe%20src=%22https://docs.google.com/presentation/d/e/2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg/embed?start=false&loop=false&delayms=3000%22%20frameborder=%220%22%20width=%22960%22%20height=%22569%22%20allowfullscreen=%22true%22%20mozallowfullscreen=%22true%22%20webkitallowfullscreen=%22true%22%3E%3C/iframe%3E";
$encodeURIComponentStr = "%3Ciframe%20src%3D%22https%3A%2F%2Fdocs.google.com%2Fpresentation%2Fd%2Fe%2F2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg%2Fembed%3Fstart%3Dfalse%26loop%3Dfalse%26delayms%3D3000%22%20frameborder%3D%220%22%20width%3D%22960%22%20height%3D%22569%22%20allowfullscreen%3D%22true%22%20mozallowfullscreen%3D%22true%22%20webkitallowfullscreen%3D%22true%22%3E%3C%2Fiframe%3E";



// php
echo urldecode($escapeStr) . PHP_EOL;
echo urldecode($encodeURIStr) . PHP_EOL;
echo urldecode($encodeURIComponentStr) . PHP_EOL;
echo PHP_EOL;
echo rawurldecode($escapeStr) . PHP_EOL;
echo rawurldecode($encodeURIStr) . PHP_EOL;
echo rawurldecode($encodeURIComponentStr) . PHP_EOL;



// result

$result = <<<SQL

[Running] php "/Applications/test.php"

http://yahoo.co.jp?keyword=%u30C7%u30B3%u30FC%u30C9&category=1
http://yahoo.co.jp?keyword=デコード&category=1
http://yahoo.co.jp?keyword=デコード&category=1

http://yahoo.co.jp?keyword=%u30C7%u30B3%u30FC%u30C9&category=1
http://yahoo.co.jp?keyword=デコード&category=1
http://yahoo.co.jp?keyword=デコード&category=1

[Done] exited with code=0 in 0.041 seconds

[Running] php "/Applications/test.php"
<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg/embed?start=false&loop=false&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg/embed?start=false&loop=false&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg/embed?start=false&loop=false&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>

<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg/embed?start=false&loop=false&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg/embed?start=false&loop=false&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRdtLsPWPOiHoZ9zX2Wf6Rb9CUqf30FEWltpAqCI4L-ClsODBt1YwUkOmHRxK_VFg/embed?start=false&loop=false&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>

[Done] exited with code=0 in 0.042 seconds

SQL;
