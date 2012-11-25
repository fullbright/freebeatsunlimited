<?php

namespace freebeats\HomeBundle\Controller;

use freebeats\HomeBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {    	
        return $this->render('freebeatsHomeBundle:Default:index.html.twig');
    }
    
    public function howDoesItWorkAction()
    {
    	return $this->render('freebeatsHomeBundle:Default:howdoesitwork.html.twig');
    }
    
    public function newsAction()
    {
    	return $this->render('freebeatsHomeBundle:Default:news.html.twig');
    }
    
    public function contactUsAction(Request $request)
    {
    	$contact = new Contact();
    	$contact->setName("Votre nom ici");
    	$contact->setEmail("Votre email ici");
    	$contact->setMessage("Votre message ici");
    	 
    	$form = $this->createFormBuilder($contact)->add("name", "text")->add("email", "text")->add("message", "text")->getForm();
    	 
    	if($request->getMethod() == 'POST')
    	{
    		$form->bind($request);
    
    		if($form->isValid())
    		{
    			$em = $this->getDoctrine()->getEntityManager();
    			$em->persist($contact);
    			$em->flush();
    			 
    			//return $this->redirect($this->generateUrl('freebeats_home_contactus_success'));
    			return $this->render("freebeatsHomeBundle:Default:contactus.success.html.twig");
    		}
    	}
    	
    	//return $this->render("freebeatsHomeBundle:Default:contact.html.twig", array("form" => $form->createView()));
    	return $this->render("freebeatsHomeBundle:Default:contact.form.html.twig", array("form" => $form->createView()));
    }
    
    /*public function embeddedcontactformAction(Request $request)
    {
    	$contact = new Contact();
    	$contact->setName("Votre nom ici");
    	$contact->setEmail("Votre email ici");
    	$contact->setMessage("Votre message ici");
    
    	$form = $this->createFormBuilder($contact)->add("name", "text")->add("email", "text")->add("message", "text")->getForm();
    
    	return $this->render("freebeatsHomeBundle:Default:contact.form.html.twig", array("form" => $form->createView()));
    }*/
    
    public function contactUsSuccessAction()
    {
    	return $this->render("freebeatsHomeBundle:Default:contactus.success.html.twig");
    }
    
    public function sitemapAction()
    {
    	return $this->render('freebeatsHomeBundle:Default:sitemaps.html.twig');
    }
    
    public function termsandconditionsAction()
    {
    	return $this->render('freebeatsHomeBundle:Default:termsandconditions.html.twig');
    }
}
