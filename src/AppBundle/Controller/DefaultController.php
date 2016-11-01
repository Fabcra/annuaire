<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        $utilisateurs=$repo->findBy(['type_user'=>'prestataire']);
//        $utilisateurs=$repo->findAll();
        $categorie=$repocateg->findAll();
        
        
        
        return $this->render('public/vignettes.html.twig',['utilisateur'=>$utilisateurs,'categorie'=>$categorie]);
    }   
    
  
}
