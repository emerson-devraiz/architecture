<?php

namespace architecture\handlers\panel\auth;

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
        $queryEmail = $this->authRepo->findEmail($auth->getIdentifyer());

        if ($queryEmail->num_rows === 0) {
            return ['result' => 'fail', 'message' => 'E-mail não encontrado!'];
        }
        
        $dataEmailEncoutred = $queryEmail->fetch_object();

        $passwordIsValid = $this->cipher->verify($auth->getPassword(), $dataEmailEncoutred->password);

        if ($passwordIsValid === false) {
            return ['result' => 'fail', 'message' => 'Senha inválida'];
        }

        $body['id_user'] = $dataEmailEncoutred->id_user;
        $body['name']    = $dataEmailEncoutred->name;

        return ['result' => 'success', 'message' => 'Usuário autenticado com sucesso!', 'body' => $body];
    }
}