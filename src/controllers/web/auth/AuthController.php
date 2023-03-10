<?php

namespace architecture\controllers\web\auth;

use architecture\app\web\View;
use architecture\Cookie;
use architecture\domain\auth\Auth;
use architecture\Filter;
use architecture\handlers\web\auth\AuthHandler;
use architecture\interfaces\ControllerInterface;
use architecture\Jwt;
use architecture\Security;

class AuthController implements ControllerInterface
{
    private Auth $auth;
    private AuthHandler $handler;
    private View $view;
    private Filter $filter;

    public function __construct(Auth $auth, AuthHandler $handler, View $view, Filter $filter)
    {
        $this->handler = $handler;
        $this->auth    = $auth;
        $this->view    = $view;
        $this->filter = $filter;
    }

    public function run(): void
    {
        $whatsapp = $this->filter->whatsapp($_POST['whatsapp']);
        $password = $_POST['password'];

        $this->auth->setIdentifyer($whatsapp);
        $this->auth->setPassword($password);

        $dataAuth = $this->handler->authenticate($this->auth);

        $cookie = new Cookie();

        if ($dataAuth['result'] === 'success') {
            $security = new Security();

            $payload  = $dataAuth['body']['id_client'] . '|' . $dataAuth['body']['name'] . '|WEB';
            $payload  = $security->encrypt($payload);

            $jwt = new Jwt();
            $jwt->addPayload('jti', $payload);
            $token = $jwt->token();

            $cookie->set(['name' => 'token', 'value' => $token]);

            $_SESSION['token']    = $token;
            $_SESSION['activity'] = TIMESTAMP;

            $this->view->redirect('home');
        }

        $cookie->set(['name' => 'message', 'value' => $dataAuth['message']]);

        $this->view->redirect('login');
    }
}
