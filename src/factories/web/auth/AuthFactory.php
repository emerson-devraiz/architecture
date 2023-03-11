<?php

namespace architecture\factories\web\auth;

use architecture\app\web\View;
use architecture\controllers\web\auth\AuthController;
use architecture\domain\auth\Auth;
use architecture\handlers\web\auth\AuthHandler;
use architecture\infra\repositories\auth\AuthRepository;
use architecture\infra\repositories\MariaDB;
use architecture\interfaces\ControllerInterface;
use architecture\interfaces\FactoryControllerInterface;
use architecture\valueobjects\password\PasswordHash;

class AuthFactory implements FactoryControllerInterface
{
    public function manufacture(): ControllerInterface
    {
        $auth       = new Auth();
        $instance   = MariaDB::conn();
        $repository = new AuthRepository($instance);
        $cipher     = new PasswordHash();
        $handler    = new AuthHandler($repository, $cipher);
        $view       = new View();
        
        return new AuthController($auth, $handler, $view);
    }
}