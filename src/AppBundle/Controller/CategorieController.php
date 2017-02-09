<?php

//GESTION DES CATEGORIES DE SERVICES

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller {
    //affichage liste des catégories de services et leur description

    /**
     * 
     * @Route("/categories/liste", name="list_categ")
     */
    public function listAction() {
        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Categorie');

        $categorie = $repo->findAll();



        return $this->render('public/categories/list_categ.html.twig', ['categorie' => $categorie]);
    }
    
    
    // description d'une categorie de service 
    /**
     * @Route("categorie/{slug}", name="show_categorie")
     */
    public function showcategoryAction($slug) {
        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Categorie');


        $nomCateg = $repo->findOneBy(['slug' => $slug]);
        $categorie = $repo->findAll();

        return $this->render('public/categories/public_categorie.html.twig', ['cat' => $nomCateg, 'categorie' => $categorie]);
    }

}
