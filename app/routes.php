<?php


// Routes
// -------------------------------

$app->get('/', 'Controller\\Home::get')->bind('home');

$app->get('/exercise/{type}/{id}', 'Controller\\Exercise::get')->bind('exercise');
$app->post('/exercise/{type}/{id}', 'Controller\\Exercise::post');

$app->get('/login', 'Controller\\Login::get')->bind('login');
$app->post('/login', 'Controller\\Login::post');

$app->get('/signup', 'Controller\\Signup::get')->bind('signup');
$app->post('/signup', 'Controller\\Signup::post');

$app->get('/logout', 'Controller\\Logout::get')->bind('logout');


// Error handling
// -------------------------------

$app->error(function (\Exception $e, $code) use ($app) {

    if ($app['config']['debug']) {
        return;
    }

    return $app['twig']->render('pages/error.twig', [
        'title' => 'Error'
    ]);
});
