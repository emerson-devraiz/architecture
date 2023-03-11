<?php

namespace architecture\factories\web\login;

use architecture\Cookie;
use architecture\interfaces\ControllerInterface;
use architecture\interfaces\FactoryControllerInterface;
use architecture\controllers\web\login\LoginController;

class LoginFactory implements FactoryControllerInterface
{
    public function manufacture(): ControllerInterface
    {
        $cookie = new Cookie();      
        
        return new LoginController($cookie);
    }
}