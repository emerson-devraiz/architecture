<?php

namespace architecture\infra\repositories\auth;

use mysqli;

class AuthRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public function findEmail(string $email)
    {
        $sql   = "SELECT id_user,
                         password
                  FROM user
                  WHERE (email = '" . $email . "')";
        return $this->conn->query($sql);
    }
}