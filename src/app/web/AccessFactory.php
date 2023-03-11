<?php

namespace architecture\app\web;

use architecture\app\web\View;
use architecture\Cookie;
use architecture\Jwt;
use architecture\Security;

class AccessFactory
{
    public function manufacture()
    {
        $cookie   = new Cookie();
        $view     = new View();
        $jwt      = new Jwt();
        $security = new Security();
        
        return new Access($cookie, $view, $jwt, $security);
    }
}