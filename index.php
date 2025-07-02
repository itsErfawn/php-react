<?php
require_once __DIR__ . '/autoload.php';

$router = require __DIR__ . '/routes.php';
$router->dispatch();
