<?php

namespace freebeats\HomeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 * @author sergio
 */
class Contact 
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=255)
	 */
	protected $email;
	
	/**
	 * @ORM\Column(type="text")
	 */
	protected $message;
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function getMessage()
	{
		return $this->message;
	}
	
	public function setName($name)
	{
		return $this->name = $name;
	}
	
	public function setEmail($email)
	{
		return $this->email = $email;
	}
	
	public function setMessage($message)
	{
		return $this->message = $message;
	}
}
