<?php

namespace architecture\app\web;

class View
{
    public function render(string $view, array $data = []): void
    {
        require '../../src/views/web/template.php';
    }

    public function redirect(string $view): void
    {
        header('Location: /' . $view);
        exit;
    }
}