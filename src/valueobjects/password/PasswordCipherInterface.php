<?php

namespace architecture\valueobjects\password;

interface PasswordCipherInterface
{
    public function encrypt(string $password): string;
    public function verify(string $password, string $hash): bool;
}