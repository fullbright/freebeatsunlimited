<?php

namespace freebeats\SurveyBundle\Controller;

use freebeats\SurveyBundle\Entity\SurveyChoice;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use freebeats\SurveyBundle\Entity\Survey;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('freebeatsSurveyBundle:Default:index.html.twig');
    }
    
    public function newAction(Request $request)
    {
    	$survey = new Survey();
    	$survey->setChoice1("zouk");
    	$survey->setChoice2("rnb");
    	
    	$choices = array(
    					"afrobeat"  => "Afrobeat", 
    					"ambient"  => "Ambient", 
    					"baroque"  => "Baroque", 
    					"ballade"  => "Ballade", 
    					"ballet"  => "Ballet", 
    					"beat"  => "Beat", 
    					"blackmetal"  => "Black metal", 
    					"blues"  => "Blues", 
    					"bolero"  => "Boléro", 
    					"breakbeat"  => "Breakbeat", 
    					"cabaret"  => "Cabaret", 
    					"capoeira"  => "Capoeira", 
    					"celtique"  => "Celtique", 
    					"chaabi"  => "Chaâbi", 
    					"cha-cha-cha"  => "Cha-cha-cha", 
    					"chansonfrancaise"  => "Chanson française", 
    					"charleston"  => "Charleston", 
    					"choeur"  => "Chœur", 
    					"classique"  => "Classique", 
    					"club"  => "Club", 
    					"country"  => "Country", 
    					"crunk"  => "Crunk", 
    					"dance"  => "Dance", 
    					"dancehall"  => "Dancehall", 
    					"dirty South"  => "Dirty South", 
    					"disco"  => "Disco", 
    					"drum and bass"  => "Drum and bass", 
    					"eastcoast"  => "East Coast", 
    					"electro"  => "Electro", 
    					"eurobeat"  => "Eurobeat", 
    					"flamenco"  => "Flamenco", 
    					"folk"  => "Folk", 
    					"funk"  => "Funk", 
    					"gangstarap"  => "Gangsta Rap", 
    					"gospel"  => "Gospel", 
    					"grunge"  => "Grunge", 
    					"hardrock"  => "Hard rock", 
    					"hard-core"  => "Hard-core", 
    					"heavymetal"  => "Heavy metal", 
    					"hip-hop"  => "Hip-hop", 
    					"jazz"  => "Jazz", 
    					"jungle"  => "jungle", 
    					"kizomba"  => "Kizomba", 
    					"kompa"  => "Kompa", 
    					"kuduro"  => "Kuduro", 
    					"latin"  => "Latin", 
    					"logobi"  => "Logobi", 
    					"mambo"  => "Mambo", 
    					"merengue"  => "Merengue", 
    					"minimaliste"  => "Minimaliste", 
    					"ndombolo"  => "Ndombolo", 
    					"nujazz"  => "Nu Jazz", 
    					"opera"  => "Opéra", 
    					"pop"  => "Pop", 
    					"poprock"  => "Pop-Rock", 
    					"rnb"  => "R'n'B", 
    					"rai"  => "Raï", 
    					"rap"  => "Rap", 
    					"rave"  => "Rave", 
    					"ragga"  => "Ragga", 
    					"reggae"  => "Reggae", 
    					"eeggaeton"  => "Reggaeton", 
    					"rock"  => "Rock", 
    					"salsa"  => "Salsa", 
    					"samba"  => "Samba", 
    					"slow"  => "Slow", 
    					"slam"  => "Slam", 
    					"soul"  => "Soul", 
    					"tango"  => "Tango", 
    					"techno"  => "Techno", 
    					"trance"  => "Trance", 
    					"zouk"  => "Zouk", 
    					);
    	
    	$form = $this->createFormBuilder($survey)
    			->add("choice1", "choice", array(
    				'choices' => $choices,
    			))
    			->add("choice2", "choice", array(
    				'choices' => $choices))
    			->getForm();
    	
    	if($request->getMethod() == 'POST')
    	{
    		$form->bind($request);
    		
    		if($form->isValid())
    		{
    			$em = $this->getDoctrine()->getEntityManager();
    			$em->persist($survey);
    			$em->flush();
    			
    			return $this->redirect($this->generateUrl('freebeats_survey_success'));
    		}
    	}
    	
    	return $this->render("freebeatsSurveyBundle:Default:new.html.twig", array("form" => $form->createView()));
    }
    
    public function successAction()
    {
    	return $this->render("freebeatsSurveyBundle:Default:success.html.twig");
    }
}
