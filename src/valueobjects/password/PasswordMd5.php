<?php

namespace architecture\valueobjects\password;

class PasswordMd5 implements PasswordCipherInterface
{
    public function __construct() {
    }

    public function encrypt(string $password): string
    {
        return md5(strrev(md5($password)));
    }

    public function verify(string $password, string $hash): bool
    {
        return $this->encrypt($password) === $hash;
    }
}