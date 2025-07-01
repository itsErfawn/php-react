<?php
require __DIR__ . "/app/Controllers/HomeController.php";
require __DIR__ . "/app/Controllers/AboutController.php";
use App\Controllers\AboutController;
use App\Controllers\HomeController;

$routes = [
    '/' => [HomeController::class, 'index'],
    '/about' => [AboutController::class, 'index'],
];
