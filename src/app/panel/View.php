<?php

namespace architecture\app\panel;

class View
{
    public function render(string $view, array $data = []): void
    {
        require '../../src/views/panel/template.php';
    }

    public function redirect(string $view): void
    {
        header('Location: /' . $view);
        exit;
    }
}