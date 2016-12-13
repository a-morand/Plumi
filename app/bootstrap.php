<?php

// Autoloader
// -------------------------------

$loader = require_once PHP_ROOT . 'vendor/autoload.php';
$loader->add('Controller', PHP_ROOT . 'src');
$loader->add('Model', PHP_ROOT . 'src');


// Init app
// -------------------------------

$app = new Silex\Application();


// Config
// -------------------------------


$config = require __DIR__ . '/config.php';
if (!is_array($config)) {
    return false;
}

$app['config'] = $config;
if ($app['config']['debug']) {
    $app['debug'] = true;
    ini_set('display_errors', true);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', false);
    error_reporting(0);
}


// Services
// -------------------------------

require_once __DIR__ . '/services.php';

foreach ($config['twig']['globals'] as $key => $value) {
    $app['twig']->addGlobal($key, $value);
}
$app['twig']->addGlobal('user', $app['session']->get('user'));


// Routes
// -------------------------------

require_once __DIR__ . '/routes.php';


// Done !
// -------------------------------

return $app;
