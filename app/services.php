<?php

// Url
// -------------------------------

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());


// Session
// -------------------------------

$app->register(new Silex\Provider\SessionServiceProvider());


// Twig
// -------------------------------

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => PHP_ROOT . 'src/views',
));


// Database
// -------------------------------

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
        'driver'    => 'pdo_mysql',
        'host'      => '91.216.107.248',
        'dbname'    => 'leaba678279',
        'user'      => 'leaba678279',
        'password'  => '0lmnzqqvug',
        'charset'   => 'utf8'
    ),
));

$app['db']->setFetchMode(PDO::FETCH_OBJ);
