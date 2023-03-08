<?php

namespace architecture\valueobjects\password;

class PasswordSha1 implements PasswordCipherInterface
{
    public function __construct() {
    }

    public function encrypt(string $password): string
    {
        return sha1(strrev(sha1($password)));
    }

    public function verify(string $password, string $hash): bool
    {
        return $this->encrypt($password) === $hash;
    }
}