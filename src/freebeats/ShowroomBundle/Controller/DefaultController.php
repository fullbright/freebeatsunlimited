<?php

namespace freebeats\ShowroomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('freebeatsShowroomBundle:Default:moulinrouge.html.twig');
    }
}
