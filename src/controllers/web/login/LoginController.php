<?php

namespace architecture\controllers\web\login;

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
        
        if (isset($_COOKIE['message'])) {
            $data['message'] = $_COOKIE['message'];
            $this->cookie->destroy('message');
        }

        require '../../src/views/web/login/login.php';
    }
}