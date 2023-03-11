<?php

namespace architecture\factories\panel\home;

use architecture\app\panel\View;
use architecture\controllers\panel\home\HomeController;
use architecture\interfaces\ControllerInterface;
use architecture\interfaces\FactoryControllerInterface;

class HomeFactory implements FactoryControllerInterface
{
    public function manufacture(): ControllerInterface
    {  
        $view = new View();

        return new HomeController($view);
    }
}