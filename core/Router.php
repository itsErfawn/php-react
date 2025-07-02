<?php

namespace Core;

class Router
{
    protected array $routes = [];

    public function get(string $path, callable|array $action)
    {
        $this->addRoute('GET', $path, $action);
    }

    public function post(string $path, callable|array $action)
    {
        $this->addRoute('POST', $path, $action);
    }

    protected function addRoute(string $method, string $path, callable|array $action)
    {
        $this->routes[$method][$path] = $action;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        $routes = $this->routes[$method] ?? [];

        foreach ($routes as $path => $action) {
            if ($this->match($path, $uri, $params)) {
                return $this->callAction($action, $params);
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

    protected function match(string $path, string $uri, &$params): bool
    {
        $pattern = preg_replace('#\{([\w]+)\}#', '([^/]+)', $path);
        $pattern = "#^" . $pattern . "$#";

        if (preg_match($pattern, $uri, $matches)) {
            array_shift($matches);
            $params = $matches;
            return true;
        }

        return false;
    }

    protected function callAction(callable|array $action, array $params)
    {
        if (is_array($action)) {
            
            [$controller, $method] = $action;



            $controller = new $controller();
            return $controller->$method(...$params);
        }

        return call_user_func_array($action, $params);
    }
}
