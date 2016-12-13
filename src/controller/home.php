<?php

namespace Controller;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

/**
 * Home page, that matchs webroot
 */
class Home
{
    private $config = [
        'title' => 'Home'
    ];

    public function get(Request $request, Application $app)
    {
        return $app['twig']->render('pages/home.twig', $this->config);
    }
}
