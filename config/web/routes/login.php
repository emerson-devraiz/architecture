<?php

use architecture\factories\web\auth\AuthFactory;
use architecture\factories\web\login\LoginFactory;

return [
    'GET|login' => LoginFactory::class,
    'POST|auth' => AuthFactory::class
];
