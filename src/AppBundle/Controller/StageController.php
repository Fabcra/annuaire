<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Stage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StageController extends Controller {
    
    
    /**
     * 
     * @Route("/prestataires/liste_stages", name="list_stages")
     *  
     */
    public function listAction() {
        
        $doctrine = $this->getDoctrine();
        $repo= $doctrine->getRepository('AppBundle:Stage');
        
        $stage = $repo->findAll();
        dump($stage);
        return $this->render('public/stages/liste_stage.html.twig', ['stage'=>$stage]);
        
    }
    
    
}
