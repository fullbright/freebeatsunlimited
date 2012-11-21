<?php

namespace freebeats\CustomerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

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
    
    public function createAction(Request $request)
    {
    	$logger = $this->get('logger');
    	$logger->info('We just got the logger');
    	
    	$customer = new Customer();
    	$customer->setFirstName("");
    	$customer->setLastName("");
    	$customer->setAddress("");
    	$customer->setPhoneNumber("");
    	$customer->setPostalCode("");
    	$customer->setCity("");
    	$customer->setEmail("");
    	

    	$form = $this->createFormBuilder($customer)
    	->add('firstname', 'text')
    	->add('lastname', 'text')
    	->add('address', 'text')
    	->add('postalcode', 'text')
    	->add('city', 'text')
    	->add('email', 'text')
    	->add('phonenumber', 'text')
    	->getForm();
    	
    	if($request->getMethod() == 'POST')
    	{
    		$form->bind($request);
    		
    		$form->getErrors();
    		
    		$logger->info('Form errors : '.$form->getErrors());
    		$logger->info('Form is valid ?'.$form->isValid());
    		
    		if($form->isValid())
    		{
		    	$em = $this->getDoctrine()->getEntityManager();
		    	$em->persist($customer);
		    	$em->flush();
		    	return $this->redirect($this->generateUrl('freebeats_customer_pay'));
    		}
    	}
    	
    	return $this->render('freebeatsCustomerBundle:Default:createcustomer.html.twig', 
    			array('form' => $form->createView(),)
    	);
    }
    
    public function payAction()
    {
    	$logger = $this->get('logger');
    	$logger->info('Pay action called');
    	//redirect to paypal
    	return $this->render('freebeatsCustomerBundle:Default:paypal.html.twig');
    }
    
    public function paySuccessAction()
    {
    	$logger = $this->get('logger');
    	$logger->info('Pay success action called');
    	//redirect to paypal
    	return $this->render('freebeatsCustomerBundle:Default:pay.success.html.twig');
    }
    
    public function payFailedAction()
    {
    	$logger = $this->get('logger');
    	$logger->info('Pay failed action called');
    	//redirect to paypal
    	return $this->render('freebeatsCustomerBundle:Default:pay.failed.html.twig');
    }
    
    public function createSuccessAction()
    {
    	return $this->render('freebeatsCustomerBundle:Default:createcustomer.success.html.twig');
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
