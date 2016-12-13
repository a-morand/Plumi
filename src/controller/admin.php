<?php

namespace Controller;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

/**
 * Admin page
 */
class Admin
{
    private $config = [
        'title' => 'Admin'
    ];

    public function get(Request $request, Application $app)
    {
        return $app['twig']->render('pages/admin.twig', $this->config);
    }

    public function post(Request $request, Application $app)
    {
        $post = $request->request->all();

        $username = $post['username'];
        $password = $post['password'];

        $user = new \Model\Admin($app['db'], $app['session']);

        if ($user->signup($username, $password)) {
            return $app->redirect($app['url_generator']->generate('home'));
        } else {
            return $app['twig']->render('pages/admin.twig', $this->config);
        }
    }
}
