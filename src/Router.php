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
            $pattern = preg_replace('/\{[a-z]+\}/', '(\d+)', $route['path']);
            if(($route['method'] === $method) && preg_match('#^' . $pattern . '$#', $url, $matches)) {
                if(isset($matches[1])){
                    $route['handler']($matches[1]);
                    return;
                }else{
                    $route['handler']();
                    return;
                }
            }
        }
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Path Not Found']);
    }
}
