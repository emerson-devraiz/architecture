<?php

namespace architecture\controllers\web\logout;

use architecture\app\web\View;
use architecture\Cookie;
use architecture\interfaces\ControllerInterface;

class LogoutController implements ControllerInterface
{
    private Cookie $cookie;
    private View $view;

    public function __construct(Cookie $cookie, View $view) {
        $this->cookie = $cookie;
        $this->view   = $view;
    }

    public function run(): void
    {
        session_destroy();
        $this->cookie->destroy('token');
        $this->view->redirect('login');
    }
}