<?php

use architecture\Cookie;
use architecture\Router;
use architecture\Access;
use architecture\View;

require '../vendor/autoload.php';
require '../src/config.php';

$cookie = new Cookie();
$view   = new View();

$httpRequest = $_SERVER['REQUEST_METHOD'];

$router = new Router();
$route  = $router->getRoute();

$pathRoutes = '../routes/' . $route . '.php';

if (file_exists($pathRoutes) === false) {
    $cookie->set(['name' => 'toast-warning', 'value' => 'Rota inválida!']);
    $view->redirect('login');
}

$routes = require $pathRoutes;

if (array_key_exists($httpRequest, $routes) === false) {
    $cookie->set(['name' => 'toast-warning', 'value' => 'Requisição inválida!']);
    $view->redirect('login');
}

session_start();

if ($router->isLogin() === false) {
    $access = new Access($cookie, $view );
    $access->validate();
}

$class = $routes[$httpRequest];

$factory    = new $class();
$controller = $factory->manufacture();
$controller->run();

?>