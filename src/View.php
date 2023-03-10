<?php

namespace architecture;

class View
{
    public function __construct() {

    }

    public function render(string $view, array $data = []): void
    {
        require '../src/views/template.php';
    }

    public function redirect(string $view): void
    {
        header('Location: /' . $view);
        exit;
    }
}