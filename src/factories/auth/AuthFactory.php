<?php

namespace architecture\factories\auth;

use architecture\controllers\auth\AuthController;
use architecture\domain\auth\Auth;
use architecture\handlers\auth\AuthHandler;
use architecture\infra\repositories\auth\AuthRepository;
use architecture\infra\repositories\MariaDB;
use architecture\interfaces\ControllerInterface;
use architecture\interfaces\FactoryControllerInterface;
use architecture\valueobjects\password\PasswordHash;
use architecture\View;

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