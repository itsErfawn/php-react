<?php

require __DIR__ . '/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


if (array_key_exists($uri, $routes)) {
    [$controller, $method] = $routes[$uri];
    (new $controller())->$method();
} else {
    http_response_code(404);
    echo "صفحه مورد نظر پیدا نشد.";
}
