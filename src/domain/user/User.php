<?php

namespace architecture\domain\user;

use architecture\valueobjects\Email;

class User
{
    private int $id;
    private string $name;
    private Email $email;
    private string $password;

    public function setIdUser(int $idUser): self
    {
        $this->id = $idUser;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setEmai(string $email): self
    {
        $this->email = new Email($email);
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getIdUser(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}