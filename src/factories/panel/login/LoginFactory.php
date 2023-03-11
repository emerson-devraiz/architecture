<?php

namespace architecture\factories\panel\login;

use architecture\Cookie;
use architecture\interfaces\ControllerInterface;
use architecture\interfaces\FactoryControllerInterface;
use architecture\controllers\panel\login\LoginController;

class LoginFactory implements FactoryControllerInterface
{
    public function manufacture(): ControllerInterface
    {
        $cookie = new Cookie();      
        
        return new LoginController($cookie);
    }
}