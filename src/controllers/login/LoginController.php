<?php

namespace architecture\controllers\login;

use architecture\Cookie;
use architecture\interfaces\ControllerInterface;

class LoginController implements ControllerInterface
{
    private Cookie $cookie;

    public function __construct(Cookie $cookie) {
        $this->cookie = $cookie;
    }

    public function run(): void
    {
        $data = [];
        
        if (isset($_COOKIE['toast-danger'])) {
            $data['toast-danger'] = $_COOKIE['toast-danger'];
            $this->cookie->destroy('toast-danger');
        }

        if (isset($_COOKIE['toast-success'])) {
            $data['toast-success'] = $_COOKIE['toast-success'];
            $this->cookie->destroy('toast-success');
        }

        if (isset($_COOKIE['toast-warning'])) {
            $data['toast-warning'] = $_COOKIE['toast-warning'];
            $this->cookie->destroy('toast-warning');
        }

        if (isset($_COOKIE['toast-info'])) {
            $data['toast-info'] = $_COOKIE['toast-info'];
            $this->cookie->destroy('toast-info');
        }

        require '../src/views/login/login.php';
    }
}