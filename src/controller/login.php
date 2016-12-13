<?php

namespace Controller;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

/**
 * Login page
 */
class Login
{
    private $config = [
        'title' => 'Login'
    ];

    public function get(Request $request, Application $app)
    {
        return $app['twig']->render('pages/login.twig', $this->config);
    }

    public function post(Request $request, Application $app)
    {
        $post = $request->request->all();

        $username = $post['username'];
        $password = $post['password'];

        $user = new \Model\User($app['db'], $app['session']);

        if ($user->login($username, $password)) {
            return $app->redirect($app['url_generator']->generate('home'));
        }

        return $app['twig']->render('pages/login.twig', $this->config + [
            'message' => 'Mauvais user/pwd',
        ]);
    }
}
