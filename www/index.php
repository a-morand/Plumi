<?php

// Static files
// -------------------------------

$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}


// Require files
// -------------------------------

define('PHP_ROOT', __DIR__ . '/../');
$app = require_once PHP_ROOT . 'app/bootstrap.php';


// Run
// -------------------------------

if (is_object($app)) {
    $app->run();
} else {
    echo 'Sorry, something went wrong..';
}
