<?php

namespace architecture;

class Router
{
    private string $route;
    private string $action;

    public function __construct() {
        $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $url = filter_var($url, FILTER_SANITIZE_URL);

        $arrayRoutes  = explode('/', $url);
        $this->route  = ($arrayRoutes[1] === '') ? 'login' : $arrayRoutes[1];
        $this->action = (isset($arrayRoutes[2]) === true) ? $arrayRoutes[2] : $this->route;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function isLogin()
    {
        return ($this->route === 'login');
    }
}