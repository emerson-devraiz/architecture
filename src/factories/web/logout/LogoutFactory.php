<?php

namespace architecture\factories\web\logout;

use architecture\app\web\View;
use architecture\Cookie;
use architecture\interfaces\ControllerInterface;
use architecture\interfaces\FactoryControllerInterface;
use architecture\controllers\web\logout\LogoutController;

class LogoutFactory implements FactoryControllerInterface
{
    public function manufacture(): ControllerInterface
    {
        $cookie = new Cookie();
        $view   = new View();      
        
        return new LogoutController($cookie, $view);
    }
}