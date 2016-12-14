<?php

namespace Controller;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

/**
 * Exercice page
 */
class Exercice
{
    private $config = [
        'title' => 'Exercice'
    ];

    public function get(Request $request, Application $app, $type, $id)
    {
        $user = $app['session']->get('user');
        if(!$user){
            return $app->redirect($app['url_generator']->generate('login'));
        }

        $exercice = new \Model\Exercice($app['db']);
        $questions = $exercice->get($type, $id);

        return $app['twig']->render('pages/exercice.twig', $this->config + [
            'questions' => $questions
        ]);
    }

    public function post(Request $request, Application $app)
    {

        $user = $app['session']->get('user');
        if(!$user){
            return $app->redirect($app['url_generator']->generate('login'));
        }

        $user_id = $user->id;
        $post = $request->request->all();
        $exercice = new \Model\Exercice($app['db']);
        $exercice->insert($user_id, $post);

        return $app['twig']->render('pages/home.twig', $this->config);
    }
}
