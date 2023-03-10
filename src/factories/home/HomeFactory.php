<?php

namespace architecture\factories\home;

use architecture\controllers\home\HomeController;
use architecture\interfaces\ControllerInterface;
use architecture\interfaces\FactoryControllerInterface;
use architecture\View;

class HomeFactory implements FactoryControllerInterface
{
    public function manufacture(): ControllerInterface
    {  
        $view = new View();

        return new HomeController($view);
    }
}