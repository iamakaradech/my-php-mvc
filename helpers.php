<?php
if (! function_exists('view')) {
    function view($path, $data = [])
    {
        if (! array_key_exists('title', $data)) {
            $data['title'] = 'Youtube Video';
        }
        ob_start();
        require \VIEW_FOLDER . $path . '.php';
        ob_end_flush();
        unset($data);
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
        $path = $_SERVER['REQUEST_URI'];
        $index = array_search($path, array_column($routes, 'name'));
        if (is_bool($index) && ! $index) {
            return abort('404');
        }

        $route = $routes[$index];
        $action = explode('@', $route['action']);
        $class = $action[0];
        $method = $action[1];
        $controller = new $class();
        $controller->$method();
    }
}
