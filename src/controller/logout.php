<?php

namespace Controller;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

/**
 * Logout page
 */
class Logout
{
    private $config = [
        'title' => 'Logout'
    ];

    public function get(Request $request, Application $app)
    {
        $app['session']->set('user', null);
        return $app->redirect($app['url_generator']->generate('home'));
    }
}
