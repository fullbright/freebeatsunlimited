<?php

namespace freebeats\AboutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('freebeatsAboutBundle:Default:index.html.twig');
    }
}
