<?php

namespace architecture\handlers\web\auth;

use architecture\domain\auth\Auth;
use architecture\infra\repositories\auth\AuthRepository;
use architecture\valueobjects\password\PasswordCipherInterface;

class AuthHandler
{
    private AuthRepository $authRepo;
    private PasswordCipherInterface $cipher;

    public function __construct(AuthRepository $authRepo, PasswordCipherInterface $cipher) {
        $this->authRepo = $authRepo;
        $this->cipher   = $cipher;
    }

    public function authenticate(Auth $auth): array
    {
        $queryWhatsapp = $this->authRepo->findWhatsapp($auth->getIdentifyer());

        if ($queryWhatsapp->num_rows === 0) {
            return ['result' => 'fail', 'message' => 'Whatsapp não encontrado!'];
        }
        
        $dataWhatsappEncountred = $queryWhatsapp->fetch_object();

        $passwordIsValid = $this->cipher->verify($auth->getPassword(), $dataWhatsappEncountred->password);

        if ($passwordIsValid === false) {
            return ['result' => 'fail', 'message' => 'Senha inválida'];
        }

        $body['id_client'] = $dataWhatsappEncountred->id_user;
        $body['name']      = $dataWhatsappEncountred->name;

        return ['result' => 'success', 'message' => 'Usuário autenticado com sucesso!', 'body' => $body];
    }
}