<?php

namespace freebeats\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use freebeats\CustomerBundle\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	//$customer = $this->getDoctrine()->getRepository("freebeatsCustomerBundle:Customer")->findAll();
        return $this->render('freebeatsCustomerBundle:Default:index.html.twig');
    }
    
    public function createAction()
    {
    	$customer = new Customer();
    	$customer->setFirstName("Sergio");
    	$customer->setLastName("AFANOU");
    	$customer->setAddress("10 rue Jules David");
    	$customer->setPostalCode("93260");
    	$customer->setCity("Les lilas");
    	$customer->setCountry("France");
    	$customer->setEmail("sergio@example.com");
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$em->persist($customer);
    	$em->flush();
    	
    	$form = $this->createFormBuilder($customer)
    	->add('firstname', 'text')
    	->add('lastname', 'text')
    	->getForm();
    	return $this->render('freebeatsCustomerBundle:Default:createcustomer.html.twig', 
    			array('form' => $form->createView(),)
    	);
    }
    
    public function showAction($id)
    {
    	$customer = $this->retrieveCustomer($id);
    	//$customer = $this->getDoctrine()->getRepository("freebeatsCustomerBundle:Customer")->findOneBy(
    	//		array("email" => $email, "firstName" => $firstName));
    	
    	if(!$customer)
    	{
    		$this->createNotFoundException("Impossible to find custumer which id is ".$id);
    	}
    	
    	//customer found
    	return new Response("Your customer has been found. Last name : ".$customer->getLastName());
    }
    
    public function updateAction($id)
    {
    	$customer = $this->retrieveCustomer($id);
    	
    	$customer->setFirstName("New first name !");
    	$em->flush();
    	
    	return $this->redirect($this->generateUrl("freebeats_customer_list"));
    }
    
    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$customer = $em->getRepository("freebeatsCustomerBundle:Customer")->find($id);
    	
    	$em->remove($customer);
    	$em->flush();
    	return new Response("Your customer has been deleted.");
    }
    
    private function retrieveCustomer($id)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	$customer = $em->getRepository("freebeatsCustomerBundle:Customer")->find($id);
    	 
    	if(!$customer)
    	{
    		throw $this->createNotFoundException("Customer ".$id." not found.");
    	}
    	return $customer;
    }
}
