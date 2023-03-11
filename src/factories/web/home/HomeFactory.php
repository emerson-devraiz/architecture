<?php

namespace architecture\factories\web\home;

use architecture\app\web\View;
use architecture\controllers\web\home\HomeController;
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