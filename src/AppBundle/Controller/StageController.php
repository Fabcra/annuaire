<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Stage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\StageType;

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
        return $this->render('public/stages/liste_stage.html.twig', ['stage'=>$stage]);
        
    }
    
    /**
     * 
     * @Route("/prestataires/stage/{slug}", name="show_stage")
     */
    public function showAction($slug){
        
        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Stage');
        $repouser=$doctrine->getRepository('AppBundle:Utilisateur');
        
        $nomStage = $repo->findOneBy(['slug'=>$slug]);
        $prestataire = $repouser->findAll();
        
        return $this->render('public/stages/view_stage.html.twig', ['stage'=>$nomStage, 'prestataire'=>$prestataire]);
       
    }
    
    
    /**
     * 
     * @Route("/stage/new", name="new_stage")
     * 
     * 
     */
    public function newAction(Request $request){
        
        $newstage = new Stage();
        
        $form = $this->createForm(StageType::class, $newstage);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()){
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($newstage);
            $em->flush;
            
            $this->addFlash('Bravo, vous avez inséré un nouveau stage');
            
            return $this->redirectToRoute('accueil');
            
        }
        return $this->render('public/stages/new.html.twig', [
            'stageForm'=>$form->createView()]);
    }
    
}
