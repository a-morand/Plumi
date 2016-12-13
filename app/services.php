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
        'host'      => 'localhost',
        'dbname'    => 'plumi',
        'user'      => 'root',
        'password'  => 'root',
        'charset'   => 'utf8'
    ),
));

$app['db']->setFetchMode(PDO::FETCH_OBJ);
