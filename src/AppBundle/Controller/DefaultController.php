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
        $repo2 = $doctrine->getRepository('AppBundle:Categorie');
        $repo3 = $doctrine->getRepository('AppBundle:Image');
//        $utilisateurs=$repo->findBy(['type_user'=>'prestataire']);
        $utilisateurs=$repo->findAll();
        $categorie=$repo2->findAll();
        $image=$repo3->findAll();
        
        
        
        return $this->render('base.html.twig',['utilisateur'=>$utilisateurs,'categorie'=>$categorie, 'image'=>$image]);
    }   
    
  
}
