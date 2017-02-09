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
     * @Route("/stages/liste", name="list_stages")
     *  
     */
    public function listAction() {

        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Stage');

        $stage = $repo->findAll();
        return $this->render('public/stages/liste_stage.html.twig', ['stage' => $stage]);
    }

    /**
     * 
     * @Route("/stage/{slug}", name="show_stage")
     */
    public function showAction($slug) {

        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Stage');
        $repouser = $doctrine->getRepository('AppBundle:Utilisateur');

        $nomStage = $repo->findOneBy(['slug' => $slug]);
        $prestataire = $repouser->findAll();

        return $this->render('public/stages/view_stage.html.twig', ['stage' => $nomStage, 'prestataire' => $prestataire]);
    }

    /**
     * 
     * Insertion d'un nouveau stage
     * @Route("/stage/new", name="new_stage")
     * 
     * 
     */
    public function newAction(Request $request) {

        $newstage = new Stage();
        $prestataire = $this->getUser();


        $form = $this->createForm(StageType::class, $newstage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newstage->setUtilisateur($prestataire);

            $em = $this->getDoctrine()->getManager();
            $em->persist($newstage);
            $em->flush();

            $this->addFlash('success', 'Bravo, vous avez inséré un nouveau stage');

            return $this->redirectToRoute('accueil');
        }
        return $this->render('public/stages/new.html.twig', [
                    'stageForm' => $form->createView()]);
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

    /**
     * 
     * @Route("/stage/update/{id}", name="stage_update")
     * 
     */
    public function updateAction(Request $request, $id = null) {

        $stage = $this->getDoctrine()->getManager()->getRepository('AppBundle:Stage')->findOneById($id);

        $form = $this->createForm(StageType::class, $stage);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($stage);
            $em->flush();

            $this->addFlash('success', 'update effectué avec succès');


            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/stages/update.html.twig', [
                    'stageForm' => $form->createView(), 'id' => $id]);
    }

    

}
