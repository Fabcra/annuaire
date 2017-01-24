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
     * @Route("/services_liste", name="list_categ")
     */
    public function listAction() {
        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Categorie');

        $categorie = $repo->findAll();



        return $this->render('public/categories/list_categ.html.twig', ['categorie' => $categorie]);
    }

}
