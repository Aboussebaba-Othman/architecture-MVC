<?php

namespace App\Core\Router;

class Router
{
    private array $routes = [];

    public function add(string $path, string $controller, string $method)
    {
        $this->routes[$path] = ['controller' => $controller, 'method' => $method];
    }

    public function dispatch(string $url)
    {
        if (isset($this->routes[$url])) {
            $controllerName = "App\\Controllers\\" . $this->routes[$url]['controller'];
            $method = $this->routes[$url]['method'];

            if (class_exists($controllerName) && method_exists($controllerName, $method)) {
                $controller = new $controllerName();
                call_user_func([$controller, $method]);
            } else {
                http_response_code(404);
                echo "Page not found.";
            }
        } else {
            http_response_code(404);
            echo "Page not found.";
        }
    }
}
