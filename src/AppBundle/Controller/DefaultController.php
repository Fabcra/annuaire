<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function listAction()
    {
        $doctrine=$this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');
        $utilisateurs=$repo->findBy(['typeUser'=>'prestataire']);
        $categorie=$repocateg->findAll();
        
        
        
        return $this->render('public/vignettes.html.twig',['utilisateur'=>$utilisateurs,'categorie'=>$categorie]);
    }   
    
   
   
  
}
