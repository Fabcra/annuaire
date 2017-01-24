<?php

// RECHERCHE ET UPDATE PRESTATAIRES

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UtilisateurType;
use AppBundle\Entity\Utilisateur;

class PrestataireController extends Controller {
    //affiche une liste de prestataires de serviceS selon les critères encodés ou sélectionnés 
    //en utilisant un querybuilder dans la fonction search de l'utilisateurRepository

    /**
     * @Route("/recherche", name="recherche_prestataires")
     */
    public function listAction(Request $request) {

        $params = $request->request->all();

        $doctrine = $this->getDoctrine();

        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');

        $prestataires = $repo->search($params);

        $categ = $repocateg->findAll();




        return $this->render('public/prestataires/public_prestataires_list.html.twig', ['prestataires' => $prestataires, 'categorie' => $categ]);
    }

    // affiche la fiche du prestataire de service sélectionné après une recherche dans le module

    /**
     * 
     * @Route("detail-prestataire/{slug}", name="show_prestataire")
     */
    public function showAction($slug) {
        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');
        $repostage = $doctrine->getRepository('AppBundle:Stage');

        $nomPresta = $repo->findOneBy(['slug' => $slug]);
        $categ = $repocateg->findAll();
        $stage = $repostage->findAll();


        return $this->render('public/prestataires/public_prestataire.html.twig', ['presta' => $nomPresta, 'categorie' => $categ, 'stage' => $stage]);
    }

    // liste des prestataires selon la catégorie sélectionnée initialement dans la navigation

    /**
     * 
     * @Route("/liste/{slug}", name="liste_prestataires_categorie")
     * */
    public function listbycategorie($slug) {

        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');

        $utilisateur = $repo->findBy(['typeUser' => 'prestataire']);
        $categ = $repocateg->findByNomCategorie(['slug' => $slug]);




        return $this->render('public/prestataires/prestataires_by_categorie.html.twig', ['categorie' => $categ[0], 'prestataire' => $utilisateur]);
    }

    //liste des prestataires selon la catégorie de service sélectionnée dans la liste des services

    /**
     * @Route("services/{slug}", name="show_categorie")
     */
    public function secondlistAction($slug) {
        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Categorie');


        $nomCateg = $repo->findOneBy(['slug' => $slug]);
        $categorie = $repo->findAll();

        return $this->render('public/categories/public_categorie.html.twig', ['cat' => $nomCateg, 'categorie' => $categorie]);
    }

    /**
     * 
     * @Route("/prestataire/update/{id}", name="prestataire_update")
     */
    public function updateAction(Request $request, $id = null) {

        $id = $request->get('id');
        
        
        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($id);

        $form = $this->createForm(UtilisateurType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $user->setTypeUser('prestataire');

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'update effectué avec succès');


            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/prestataires/update.html.twig', [
                    'userForm' => $form->createView(), 'id'=>$id]);
    }

    /**
     * 
     * @Route("/liste_stages/{slug}", name="list_stages_presta")
     */
    public function liststages($slug) {

        
        $doctrine = $this->getDoctrine();

        $repo = $doctrine->getRepository('AppBundle:Utilisateur');


        $presta = $repo->findBySlug(['slug'=>$slug]);



        return $this->render('public/stages/list_by_presta.html.twig', ['stage'=>$presta[0]]);
    }

}
