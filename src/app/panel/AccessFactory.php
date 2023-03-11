<?php

namespace architecture\app\panel;

use architecture\app\panel\Access;
use architecture\app\panel\View;
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