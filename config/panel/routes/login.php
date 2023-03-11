<?php

use architecture\factories\panel\auth\AuthFactory;
use architecture\factories\panel\login\LoginFactory;

return [
    'GET|login' => LoginFactory::class,
    'POST|auth' => AuthFactory::class
];
