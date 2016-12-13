<?php

namespace Controller;

use \Silex\Application;
use \Symfony\Component\HttpFoundation\Request;

/**
 * Exercise page
 */
class Exercise
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

        $exercise = new \Model\Exercise($app['db']);
        $questions = $exercise->get($type, $id);

        return $app['twig']->render('pages/exercise.twig', $this->config + [
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
        $exercise = new \Model\Exercise($app['db']);
        $exercise->insert($user_id, $post);

        return $app['twig']->render('pages/result.twig', $this->config);
    }
}
