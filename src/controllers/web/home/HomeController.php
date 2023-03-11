<?php

namespace architecture\controllers\web\home;

use architecture\app\web\View;
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