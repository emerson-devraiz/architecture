<?php

namespace architecture\domain\auth;

class Auth
{
    private string $identifyer;
    private string $password;

    public function __construct() {
    }

    public function setIdentifyer(string $identifyer): self
    {
        $this->identifyer = $identifyer;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getIdentifyer(): string
    {
        return $this->identifyer;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}