<?php



class Router {
    private $routes = [];
    public function addRoute($method, $route, $controller, $action) {
        $this->routes[$method][$route] = [
            'controller' => $controller,
            'action' => $action
        ];
    }


    public function matchRoute($url, $method) {
    
        if (isset($this->routes[$method][$url])) {
            return $this->routes[$method][$url];
        }

        return null;
    }


    public function dispatch($url, $method) {
    
        $route = $this->matchRoute($url, $method);

        if ($route) {
            $controllerName = $route['controller'];
            $actionName = $route['action'];

            $controller = new $controllerName();
            $controller->$actionName();
        } else {
        
            echo "Page non trouvée";
        }
    }
}
