<?php

namespace freebeats\UnlimitedcardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('freebeatsUnlimitedcardBundle:Default:index.html.twig');
    }
}
