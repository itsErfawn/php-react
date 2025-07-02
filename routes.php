<?php

use App\Controllers\AboutController;
use App\Controllers\HomeController;
use Core\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [AboutController::class, 'index']);

return $router;