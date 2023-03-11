<?php

$envs = parse_ini_file('../../.env');

foreach ($envs as $key => $value) {
    define($key, $value);
}

define('TODAY', date('Y-m-d'));
define('NOW', date('H:i:s'));
define('TIMESTAMP', strtotime(TODAY . ' ' . NOW));

define('YEAR', date('Y'));

define('URL_CDN', 'http://cdn.devraiz.com/v1');