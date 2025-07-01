<?php
$text = $_SERVER['REQUEST_URI'];
if ($text!="/"||!$text) {
    $rest = substr($text, 1);
    $firstChar = strtoupper($rest[0]);
    $remaining = substr($rest, 1);
    $result = $firstChar . $remaining;
    require dirname(__DIR__) . "/app/Controllers/" . $result . "Controller.php";
} else {
    require dirname(__DIR__) . "/app/Controllers/HomeController.php";
}