<?php

namespace architecture;

class Filter
{
    public function cnpj(string $cnpj): string
    {
        $filter = str_replace('.', '', $cnpj);
        $filter = str_replace('/', '', $filter);
        $filter = str_replace('-', '', $filter);

        return $filter;
    }

    public function whatsapp(string $whatsapp): string
    {
        $filter = str_replace('+', '', $whatsapp);
        $filter = str_replace('(', '', $filter);
        $filter = str_replace(')', '', $filter);
        $filter = str_replace('-', '', $filter);
        $filter = str_replace(' ', '', $filter);

        return $filter;
    }
}