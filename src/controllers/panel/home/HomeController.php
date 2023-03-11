<?php

namespace architecture\controllers\panel\home;

use architecture\app\panel\View;
use architecture\interfaces\ControllerInterface;

class HomeController implements ControllerInterface
{
    private View $view;

    public function __construct(View $view) {
        $this->view = $view;
    }

    public function run(): void
    {
        $this->view->render('home/home');
    }
}