<?php

namespace Controller;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

/**
 * Results page
 */
class Results
{
    private $config = [
        'title' => 'Results'
    ];

    public function get(Request $request, Application $app, $fill) 
    {
        $results = new \Model\Results($app['db']);
        $fillAnswer = $results->getFill($fill);

        return $app['twig']->render('pages/results.twig', $this->config + [
            'fill' => $fillAnswer]);
    }

    public function post(Request $request, Application $app)
    {
        $post = $request->request->all();
            return $app['twig']->render('pages/results.twig', $this->config);
    }
}
