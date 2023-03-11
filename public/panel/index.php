<?php

use architecture\app\panel\AccessFactory;
use architecture\app\panel\View;
use architecture\Cookie;
use architecture\Router;

require '../../vendor/autoload.php';
require '../../config/config.php';
require '../../config/panel/config.php';

$cookie = new Cookie();
$view   = new View();

$httpRequest = $_SERVER['REQUEST_METHOD'];

$router = new Router();
$route  = $router->getRoute();
$action = $router->getAction();

$pathRoutes = '../../config/panel/routes/' . $route . '.php';

if (file_exists($pathRoutes) === false) {
    $cookie->set(['name' => 'toast-warning', 'value' => 'Rota inválida!']);
    $view->redirect('login');
}

$routes = require $pathRoutes;

$key = $httpRequest . '|' . $action;

if (array_key_exists($key, $routes) === false) {
    $cookie->set(['name' => 'toast-warning', 'value' => 'Requisição inválida!']);
    $view->redirect('login');
}

session_start();

if ($router->isLogin() === false) {
    $access = (new AccessFactory())->manufacture();
    $access->validate();
}

$class = $routes[$key];

$factory    = new $class();
$controller = $factory->manufacture();
$controller->run();

?>