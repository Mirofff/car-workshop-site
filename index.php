<?php
require_once 'vendor/autoload.php';
require_once 'routes.php';

$dotenv = Dotenv\Dotenv::createImmutable('.');
$dotenv->load();

require_once "Common/Auth.php";

spl_autoload_register(function($className)
{
    $className=str_replace("\\","/",$className);
    $class = (empty($namespace)?"":$namespace."/")."{$className}.php";
    include_once($class);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // Обработка случая, когда маршрут не найден
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // Обработка случая, когда метод запроса не разрешен
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $params = $routeInfo[2];

        list($controllerName, $methodName) = explode('@', $handler);
        $controller = new $controllerName();
        $controller->$methodName($params);
        break;
}
