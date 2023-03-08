<?php

namespace architecture\valueobjects\password;

class PasswordHash implements PasswordCipherInterface
{
    public function __construct() {
    }

    public function encrypt(string $password): string
    {
        return password_hash($password, HASH_DEFAULT);
    }

    public function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}