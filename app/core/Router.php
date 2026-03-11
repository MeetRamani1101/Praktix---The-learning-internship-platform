<?php

class Router {
    private array $routes = [];

    public function get(string $url, string $controller, string $method): void {
        $this->routes['GET'][$url] = ['controller' => $controller, 'method' => $method];
    }

    public function post(string $url, string $controller, string $method): void {
        $this->routes['POST'][$url] = ['controller' => $controller, 'method' => $method];
    }

    public function dispatch(): void {
        $url    = trim($_GET['url'] ?? '', '/');
        $httpMethod = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$httpMethod][$url])) {
            $route      = $this->routes[$httpMethod][$url];
            $controllerName = $route['controller'];
            $method     = $route['method'];

            $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();
                $controller->$method();
            } else {
                $this->notFound();
            }
        } else {
            $this->notFound();
        }
    }

    private function notFound(): void {
        http_response_code(404);
        echo "<div style='font-family:sans-serif;text-align:center;padding:80px'>
              <h2>404 — Page Not Found</h2>
              <a href='/'>Go Home</a></div>";
    }
}
