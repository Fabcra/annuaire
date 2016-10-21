<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Utilisateur;
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
        
        $utilisateurs=$repo->findBy(['type_user'=>'prestataire']);
        
        
        return $this->render('base.html.twig',['utilisateurs'=>$utilisateurs]);
    }
}
