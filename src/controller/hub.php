<?php

namespace Controller;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

/**
 * Hub page, that matchs webroot
 */
class Hub
{
    private $config = [
        'title' => 'Hub'
    ];

    public function get(Request $request, Application $app)
    {
        return $app['twig']->render('pages/hub.twig', $this->config);
    }
}
