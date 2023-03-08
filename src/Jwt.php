<?php

namespace architecture;

class Jwt
{
    private array $headers;
    private array $payload;

    public function __construct() {
        $this->addHeader('alg', JWT_ALG);
        $this->addHeader('typ', 'JWT');

        $this->addPayload('iss', JWT_ISS);
        $this->addPayload('sub', JWT_SUB);
        $this->addPayload('iat', TIMESTAMP);
    }

    public function addHeader(string $key, string $value): void
    {
        $this->headers[$key] = $value;
    }

    public function addPayload(string $key, string $value): void
    {
        $this->payload[$key] = $value;
    }

    public function token(): string
    {
        $headers = json_encode($this->headers);
        $headers = $this->encode($headers);

        $payload = json_encode($this->payload);
        $payload = $this->encode($payload);

        $signature = hash_hmac('sha256', "$headers.$payload", JWT_KEY, true);
        $signature = $this->encode($signature);

        $token = "$headers.$payload.$signature";

        return $token;
    }

    private function encode(string $payload): string
    {
        return str_replace('=', '', strtr(base64_encode($payload), '+/', '-_'));
    }

    public function decode(string $payload): string
    {
        $remainder = strlen($payload) % 4;

        if ($remainder) {
            $padding = 4 - $remainder;
            $payload .= str_repeat('=', $padding);
        }

        return base64_decode(strtr($payload, '-_', '+/'));
    }
}