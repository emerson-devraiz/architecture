<?php

namespace architecture\valueobjects\document;

class Cpf
{
    private string $type;
    private string $cpf;

    public function __construct(string $cpf)
    {
        $this->type = 'F';
        $this->cpf  = $cpf;
        $this->filter();
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDocument(): string
    {
        return $this->cpf;
    }

    private function filter(): void
    {
        $this->cpf = str_replace('.', '', $this->cpf);
        $this->cpf = str_replace('-', '', $this->cpf);
    }
}