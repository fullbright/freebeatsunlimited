<?php

namespace freebeats\SurveyBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="survey")
 * @author sergio
 */
class Survey 
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $choice1;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $choice2;
	

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set choice1
     *
     * @param string $choice1
     * @return Survey
     */
    public function setChoice1($choice1)
    {
        $this->choice1 = $choice1;
    
        return $this;
    }

    /**
     * Get choice1
     *
     * @return string 
     */
    public function getChoice1()
    {
        return $this->choice1;
    }

    /**
     * Set choice2
     *
     * @param string $choice2
     * @return Survey
     */
    public function setChoice2($choice2)
    {
        $this->choice2 = $choice2;
    
        return $this;
    }

    /**
     * Get choice2
     *
     * @return string 
     */
    public function getChoice2()
    {
        return $this->choice2;
    }
}