<?php

namespace App;
class Router {
    private array $routes = [];
    function add(string $method, string $path, callable $handler): void {
       $this->routes[] = [
           'method' => $method,
           'path' => $path,
           'handler' => $handler
       ];

    }

    function dispatch() {
        $url = $_SERVER['REQUEST_URI'];
        if (strpos($url, '?') !== false) {
            $url = substr($url, 0, strpos($url, '?'));
        }
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes as $route) {
            if(($route['path'] === $url)&&($route['method'] === $method)) {
                $route['handler']();
                return;
            }
        }
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Path Not Found']);
    }

}
