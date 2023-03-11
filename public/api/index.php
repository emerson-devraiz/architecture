<?php

use architecture\Cookie;
use architecture\Router;
use architecture\Access;
use architecture\View;

require '../../vendor/autoload.php';
require '../../src/config.php';

$cookie = new Cookie();
$view   = new View();

$router = new Router();
$route  = $router->getRoute();
$action = $router->getAction();

$pathRoutes = '../../routes/' . $route . '.php';

var_dump($pathRoutes);
exit;

if (file_exists($pathRoutes) === false) {
    $cookie->set(['name' => 'toast-warning', 'value' => 'Rota inválida!']);
    $view->redirect('login');
}

$routes = require $pathRoutes;

if (array_key_exists($action, $routes) === false) {
    $cookie->set(['name' => 'toast-warning', 'value' => 'Requisição inválida!']);
    $view->redirect('login');
}

session_start();

if ($router->isLogin() === false) {
    $access = new Access($cookie, $view);
    $access->validate();
}

$class = $routes[$action];

$factory    = new $class();
$controller = $factory->manufacture();
$controller->run();

?>