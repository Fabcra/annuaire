<?php

// AFFICHAGE DE L'ECRAN D'ACCUEIL

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    //liste des vignettes de 8 prestataires de service
    /**
     * @Route("/", name="accueil")
     */
    public function listAction() {

        $user = $this->getUser();

        if ($user) {
            $banni = $user->getBanni();
            if ($banni == true) {
                
                return $this->redirectToRoute('logout');
            }
        }



        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');
        $utilisateurs = $repo->findBy(['typeUser' => 'prestataire']);
        $categorie = $repocateg->findAll();

        return $this->render('public/vignettes.html.twig', ['utilisateur' => $utilisateurs, 'categorie' => $categorie]);
    }

}
