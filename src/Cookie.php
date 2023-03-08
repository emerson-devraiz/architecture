<?php

namespace architecture;

class Cookie
{
    public function __construct()
    {
    }

    public function set(array $params)
    {
        $expires = (isset($params['expires']) === true) ? $params['expires'] : 0;
        $path    = (isset($params['path'])    === true) ? $params['path']    : '/';

        setcookie($params['name'], $params['value'], $expires, $path);
    }

    public function destroy(string $name)
    {
        unset($_COOKIE[$name]);
        setcookie($name, '', -1, '/');
    }
}
