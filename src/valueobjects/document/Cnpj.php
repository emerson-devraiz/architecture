<?php

namespace architecture\valueobjects\document;

use architecture\valueobjects\document\DocumentInterface;

class Cnpj implements DocumentInterface
{
    private string $type;
    private string $cnpj;

    public function __construct(string $cnpj)
    {
        $this->type = 'J';
        $this->cnpj = $cnpj;
        $this->filter();
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDocument(): string
    {
        return $this->cnpj;
    }

    private function filter(): void
    {
        $this->cnpj = str_replace('.', '', $this->cnpj);
        $this->cnpj = str_replace('/', '', $this->cnpj);
        $this->cnpj = str_replace('-', '', $this->cnpj);
    }
}