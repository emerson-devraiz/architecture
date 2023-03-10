<?php

namespace architecture\factories\logout;

use architecture\Cookie;
use architecture\interfaces\ControllerInterface;
use architecture\interfaces\FactoryControllerInterface;
use architecture\controllers\logout\LogoutController;
use architecture\View;

class LogoutFactory implements FactoryControllerInterface
{
    public function manufacture(): ControllerInterface
    {
        $cookie = new Cookie();
        $view   = new View();      
        
        return new LogoutController($cookie, $view);
    }
}