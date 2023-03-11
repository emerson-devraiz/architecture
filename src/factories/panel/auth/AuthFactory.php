<?php

namespace architecture\factories\panel\auth;

use architecture\app\panel\View;
use architecture\controllers\panel\auth\AuthController;
use architecture\domain\auth\Auth;
use architecture\handlers\panel\auth\AuthHandler;
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