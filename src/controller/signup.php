<?php

namespace Controller;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

/**
 * Signup page
 */
class Signup
{
    private $config = [
        'title' => 'Signup'
    ];

    public function get(Request $request, Application $app)
    {
        return $app['twig']->render('pages/signup.twig', $this->config);
    }

    public function post(Request $request, Application $app)
    {
        $post = $request->request->all();

        $username = $post['username'];
        $password = $post['password'];

        $user = new \Model\Signup($app['db'], $app['session']);

        if ($user->signup($username, $password)) {
            return $app->redirect($app['url_generator']->generate('home'));
        } else {
            return $app['twig']->render('pages/signup.twig', $this->config);
        }
    }
}
