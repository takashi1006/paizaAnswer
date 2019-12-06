<?php



function display($message) {
    echo "<p>" . $message . "</p>";
}

session_start();

// $_SESSION["count"] = 10;
// $_SESSION["ID"] = "ID";

// display("メッセージ");

// display($_SESSION["count"]);

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";


session_destroy();

// display($_SESSION["count"]);


