<?php

namespace architecture\factories\panel\logout;

use architecture\app\panel\View;
use architecture\Cookie;
use architecture\interfaces\ControllerInterface;
use architecture\interfaces\FactoryControllerInterface;
use architecture\controllers\panel\logout\LogoutController;

class LogoutFactory implements FactoryControllerInterface
{
    public function manufacture(): ControllerInterface
    {
        $cookie = new Cookie();
        $view   = new View();      
        
        return new LogoutController($cookie, $view);
    }
}