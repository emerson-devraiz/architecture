<?php

namespace architecture\controllers\home;

use architecture\interfaces\ControllerInterface;

use architecture\View;

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