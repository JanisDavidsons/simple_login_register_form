<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $router) {
    $router->addRoute('GET', '/', 'LoginController@login');
    $router->addRoute('POST', '/loadUser', 'LoginController@loadUser');
    $router->addRoute('GET', '/logOut', 'LoginController@logOut');

    $router->addRoute('GET', '/register', 'RegisterController@register');
    $router->addRoute('POST', '/store', 'RegisterController@store');
    $router->addRoute('GET', '/emailSent', 'RegisterController@emailSent');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        var_dump("not found!!!!");
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $params = $routeInfo[2];

        [$controller, $method] = explode('@', $handler);
        $controllerPath = 'myApp\Controllers\\' . $controller;
        echo (new $controllerPath)->{$method}($params);
        break;
}
