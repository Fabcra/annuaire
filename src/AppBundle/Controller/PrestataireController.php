<?php

// RECHERCHE ET UPDATE PRESTATAIRES

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UtilisateurType;
use AppBundle\Entity\Utilisateur;
use AppBundle\Entity\Message;
use AppBundle\Entity\Image;
use AppBundle\Form\ImageType;
use AppBundle\Form\MessageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class PrestataireController extends Controller {
    //affiche une liste de prestataires de serviceS selon les critères encodés ou sélectionnés 
    //en utilisant un querybuilder dans la fonction search de l'utilisateurRepository

    /**
     * @Route("/rechercher", name="recherche_prestataires")
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
     * @Route("prestataire/{slug}", name="show_prestataire")
     */
    public function showAction(Request $request, $slug) {
        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');
        $repostage = $doctrine->getRepository('AppBundle:Stage');

        $nomPresta = $repo->findOneBy(['slug' => $slug]);
        $categ = $repocateg->findAll();
        $stage = $repostage->findAll();
        $to = $nomPresta->getEmail();
        
        
        
        // envoi message
        
        $newmail = new Message();



        $form = $this->createForm(MessageType::class, $newmail);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($newmail);
            $em->flush();

            $this->addFlash('success', 'Votre message a bien été envoyé');
            
            $nom = $newmail->getNom();
            $mail = $newmail->getMail();
            $messageclient = $newmail->getMessage();
            
            
            $message = \Swift_Message::newInstance()
                    ->setSubject('Message d\'utilisateur')
                    ->setFrom($mail)
                    ->setTo($to)
                    ->setBody(
                    $this->renderView(
                            'public/prestataires/mail.html.twig', array('newmail' => $newmail)
                    ), 'text/html'
            );
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('accueil');
        }

//        return $this->render('public/prestataires/contact.html.twig', [
//                    'mailForm' => $form->createView()]);

        return $this->render('public/prestataires/public_prestataire.html.twig', ['presta' => $nomPresta, 'categorie' => $categ, 'stage' => $stage, 'mailForm' => $form->createView()]);
    }

    // liste des prestataires selon la catégorie sélectionnée initialement dans la navigation

    /**
     * 
     * @Route("/liste-prestataires/{slug}", name="liste_prestataires_categorie")
     **/
    public function listbycategorie($slug) {

        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');

        $utilisateur = $repo->findBy(['typeUser' => 'prestataire']);
        $categ = $repocateg->findByNomCategorie(['slug' => $slug]);




        return $this->render('public/prestataires/prestataires_by_categorie.html.twig', ['categorie' => $categ[0], 'prestataire' => $utilisateur]);
    }

    //update de la fiche prestataire

    /**
     * 
     * @Security("is_granted('ROLE_USER')")
     * @Route("/prestataire/update/{id}", name="prestataire_update")
     */
    public function updateAction(Request $request, $id = null) {

        $id = $request->get('id');


        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($id);

        $form = $this->createForm(UtilisateurType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $plainPassword = $user->getPassword();
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $plainPassword);

            $user->setPassword($encoded);

            $user->setTypeUser('prestataire');
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('notice', 'update effectué avec succès');


            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/prestataires/update.html.twig', [
                    'userForm' => $form->createView(), 'id' => $id]);
    }

    
}
