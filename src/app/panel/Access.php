<?php

namespace architecture\app\panel;

use architecture\app\panel\View;
use architecture\Cookie;
use architecture\Jwt;
use architecture\Security;

class Access
{
    private Cookie $cookie;
    private View $view;
    private Jwt $jwt;
    private Security $security;

    public function __construct(Cookie $cookie, View $view, Jwt $jwt, Security $security) {
        $this->cookie   = $cookie;
        $this->view     = $view;
        $this->jwt      = $jwt;
        $this->security = $security;
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

        $this->defineConstantes();
    }

    private function block(string $nameCookie, string $message)
    {
        $this->cookie->set(['name' => $nameCookie, 'value' => $message]);
        $this->view->redirect('login');
    }

    private function defineConstantes()
    {
        $tokenParsed = $this->jwt->parse($_SESSION['token']);
        $stringInfos = $this->security->decrypt($tokenParsed['payload']->jti);
        $vectorInfos = explode('|', $stringInfos);

        define('USER_ID', $vectorInfos[0]);
        define('USER_NAME', $vectorInfos[1]);
    }
}