<?php

namespace architecture;

class Security
{
    private string $key;
    private string $iv;
    private string $encryptMethod;

    public function __construct(string $secretKey = SECRET_KEY, string $secretIv = SECRET_IV, string $encryptMethod = ENCRYPT_METHOD)
    {
        $this->key = hash('sha256', $secretKey);
        $this->iv  = substr(hash('sha256', $secretKey), 0, 16);
        $this->encryptMethod = $encryptMethod;
    }

    public function encrypt(string $text): string
    {
        $output = openssl_encrypt($text, $this->encryptMethod, $this->key, 0, $this->iv);
        $output = base64_encode($output);

        return $output;
    }

    public function decrypt(string $text): string
    {
        $output = openssl_decrypt(base64_decode($text), $this->encryptMethod, $this->key, 0, $this->iv);
        return $output;
    }
}