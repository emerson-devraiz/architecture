<?php

namespace architecture;

use architecture\Cookie;
use architecture\View;

class Access
{
    private Cookie $cookie;
    private View $view;

    public function __construct(Cookie $cookie, View $view) {
        $this->cookie = $cookie;
        $this->view   = $view;
    }

    public function validate()
    {
        if (isset($_COOKIE['token']) === false) {
            $this->block('toast-danger', 'Acesso negado!');
        }

        if ($_COOKIE['token'] !== $_SESSION['token']) {
            $this->block('toast-warning', 'Token inválido!');
        }

        $timeLimitSession = (intval($_SESSION['activity']) + 30 * 60);

        if (TIMESTAMP > $timeLimitSession) {
            $this->block('toast-warning', 'Token expirado!');
        }

        $_SESSION['activity'] = TIMESTAMP;
    }

    private function block(string $nameCookie, string $message)
    {
        $this->cookie->set(['name' => $nameCookie, 'value' => $message]);
        $this->view->redirect('login');
    }
}