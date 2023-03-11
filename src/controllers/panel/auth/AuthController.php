<?php

namespace architecture\controllers\panel\auth;

use architecture\app\panel\View;
use architecture\Cookie;
use architecture\domain\auth\Auth;
use architecture\handlers\panel\auth\AuthHandler;
use architecture\interfaces\ControllerInterface;
use architecture\Jwt;
use architecture\Security;

class AuthController implements ControllerInterface
{
    private Auth $auth;
    private AuthHandler $handler;
    private View $view;

    public function __construct(Auth $auth, AuthHandler $handler, View $view) {
        $this->handler = $handler;
        $this->auth    = $auth;
        $this->view    = $view;
    }

    public function run(): void
    {
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $this->auth->setIdentifyer($email);
        $this->auth->setPassword($password);

        $dataAuth = $this->handler->authenticate($this->auth);

        $cookie = new Cookie();

        if ($dataAuth['result'] === 'success') {
            $security = new Security();

            $payload  = $dataAuth['body']['id_user'] . '|' . $dataAuth['body']['name'] . '|PANEL';
            $payload  = $security->encrypt($payload);

            $jwt = new Jwt();
            $jwt->addPayload('jti', $payload);
            $token = $jwt->token();

            $cookie->set(['name' => 'token', 'value' => $token]);

            $_SESSION['token']    = $token;
            $_SESSION['activity'] = TIMESTAMP;
            
            $this->view->redirect('home');
        }

        $cookie->set(['name' => 'toast-warning', 'value' => $dataAuth['message']]);

        $this->view->redirect('login');
    }
}