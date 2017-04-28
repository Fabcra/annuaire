<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Promotion;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\PromotionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Knp\Snappy\Pdf;

class PromotionController extends Controller {

    /**
     * @Security("is_granted('ROLE_USER')")
     * @param Request $request
     * @return type
     * @Route("/promotions/new", name="new_promo")
     */
    public function newAction(Request $request) {

        $newpromo = new Promotion();

        $prestataire = $this->getUser();

        $form = $this->createForm(PromotionType::class, $newpromo);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newpromo->setUtilisateur($prestataire);
            $pdf = sha1(uniqid(mt_rand(), true)) . '.pdf';

            $newpromo->setDocumentPDF($pdf);

            $em = $this->getDoctrine()->getManager();
            $em->persist($newpromo);
            $em->flush();

            $idpromo = $newpromo->getId();

            $this->addFlash('success', 'Vous avez créé une nouvelle promotion');






            $this->get('knp_snappy.pdf')->generate('http://localhost:8888/annuaire/web/app_dev.php/promotion/' . $idpromo, 'uploads/pdf/' . $pdf);

            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/promotions/new_promo.html.twig', [
                    'promoForm' => $form->createView()]);
    }

    /**
     * 
     * @param type $Id
     * @Route("/promotion/{id}", name="view_promo")
     */
    public function showAction($id) {

        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Promotion');


        $promo = $repo->findOneBy(['id' => $id]);

        $user = $promo->getUtilisateur();

        $banni = $user->getBanni();

        if ($banni == false) {
            return $this->render('public/promotions/view.html.twig', ['promo' => $promo]);
        } else {
            return $this->redirectToRoute('accueil');
        }
    }

    /**
     * 
     * @Route("/promotions/liste", name="liste_promotions")
     * 
     */
    public function listAction() {

        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Promotion');

        $promotion = $repo->findAll();
        return $this->render('public/promotions/liste_promotions.html.twig', ['promotion' => $promotion]);
    }

    /**
     * 
     * @param type $slug
     * @Route("/liste_promotions/{slug}", name="list_promo_presta")
     */
    public function listpromos($slug) {

        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');

        $promo = $repo->findBySlug(['slug' => $slug]);
        
        $banni = $promo[0]->getBanni();
        
           if ($banni==false){
            return $this->render('public/promotions/list_by_presta.html.twig', ['promo' => $promo[0]]);
           }else{
               return $this->redirectToRoute('accueil');
           }
            
           }

    /**
     * @Security("is_granted('ROLE_USER')")
     * @param Request $request
     * @param type $id
     * @return type
     * @Route("/promotion/update/{id}", name="update_promo")
     */
    public function updateAction(Request $request, $id = null) {

        $promo = $this->getDoctrine()->getManager()->getRepository('AppBundle:Promotion')->findOneById($id);

        $user_id = $promo->getUtilisateur()->getId();

        $form = $this->createForm(PromotionType::class, $promo);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $pdf = sha1(uniqid(mt_rand(), true)) . '.pdf';
            $promo->setDocumentPDF($pdf);

            $em = $this->getDoctrine()->getManager();
            $em->persist($promo);
            $em->flush();

            $this->addFlash('success', 'update effectué avec succès');

            $idpromo = $promo->getId();

            $this->get('knp_snappy.pdf')->generate('http://localhost:8888/annuaire/web/app_dev.php/promotion/' . $idpromo, 'uploads/pdf/' . $pdf);


            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/promotions/update.html.twig', [
                    'promoForm' => $form->createView(), 'id' => $id, 'user_id' => $user_id
        ]);
    }

    /**
     * 
     * @param type $id
     * @return type
     * @Route("/promotion/delete/{id}", name="promo_delete")
     */
    public function deleteAction($id = null) {

        $promo = $this->getDoctrine()->getManager()->getRepository('AppBundle:Promotion')->findOneById($id);


        $em = $this->getDoctrine()->getManager();
        $em->remove($promo);
        $em->flush();

        return $this->redirectToRoute('list_promo_presta', array('slug' => $this->getUser()->getSlug()));
    }

}
