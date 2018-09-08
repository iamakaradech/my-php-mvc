<?php
if (! function_exists('view')) {
    function view($path, $data = [])
    {
        ob_start();
        require \VIEW_FOLDER . $path . '.php';
        ob_end_flush();
    }
}

if (! function_exists('abort')) {
    function abort($statusCode)
    {
        return view($statusCode);
    }
}
if (! function_exists('dispatch')) {
    function dispatch($routes)
    {
        // var_dump($_SERVER);
        $path = $_SERVER['REQUEST_URI'];
        $index = array_search($path, array_column($routes, 'name'));
        // var_dump($index);
        if (is_bool($index) && ! $index) {
            return abort('404');
        }
        // var_dump($routes[$index], $index);
        $route = $routes[$index];
        $action = explode('@', $route['action']);
        $class = $action[0];
        $method = $action[1];
        $controller = new $class();
        $controller->$method();
    }
}
