<?php

namespace freebeats\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('freebeatsContactBundle:Default:index.html.twig');
    }
}
