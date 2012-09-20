<?php

namespace freebeats\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('freebeatsHomeBundle:Default:index.html.twig', array('name' => $name));
    }
}
