<?php

namespace freebeats\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('freebeatsHomeBundle:Default:index.html.twig');
    }
    
    public function sitemapAction()
    {
    	return $this->render('freebeatsHomeBundle:Default:sitemaps.html.twig');
    }
}
