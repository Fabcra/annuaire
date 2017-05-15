<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commentaire;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CommentaireType;
use AppBundle\Entity\Utilisateur;

class CommentaireController extends Controller{
    
    /**
     * 
     * @Route("{id}/commentaire/new", name="new_comment")
     * 
     */
    public function newAction(Request $request, $id){
        
        $newcom = new Commentaire();
        
        $doctrine = $this->getDoctrine();
        $user = $doctrine->getRepository('AppBundle:Utilisateur');
        
        $id_presta = $user->findOneBy(['id'=>$id]);
        
        $redacteur = $this->getUser();
        
        
        $form = $this->createForm(CommentaireType::class, $newcom);
        
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
            $newcom->setUtilisateur($id_presta);
            $newcom->setRedacteur($redacteur);
            
            $cote = $newcom->getCote();
            $ajustementcote = $cote-1;
            $newcom->setCote($ajustementcote);
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($newcom);
            $em->flush();
            
            $this->addFlash('success', 'Vous avez inséré un commentaire');
            
            return $this->redirectToRoute('accueil');
        }
        
        return $this->render('public/commentaires/new.html.twig',[
            'commentaireForm'=>$form->createView(), 'id'=>$id
        ]);
    }
}

