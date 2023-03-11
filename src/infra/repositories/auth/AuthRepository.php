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
                         name,
                         password
                  FROM user
                  WHERE (email = '" . $email . "')";
        return $this->conn->query($sql);
    }

    public function findWhatsapp(string $whatsapp)
    {
        $sql   = "SELECT id_client,
                         name,
                         password
                  FROM client
                  WHERE (whatsapp = '" . $whatsapp . "')";
        return $this->conn->query($sql);
    }
}