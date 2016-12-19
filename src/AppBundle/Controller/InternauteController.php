<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UtilisateurType;
use AppBundle\Form\PreregisterType;
use AppBundle\Entity\Preregister;
use AppBundle\Entity\Utilisateur;

class InternauteController extends Controller {

    /**
     * Inscription des internautes dans une table temporaire et envoi d'un mail de confirmation
     * 
     * @Route("/internaute/preregister", name="new_internaute")
     * 
     * 
     */
    public function preregister(Request $request) {

        $newuser = new Preregister();


        $form = $this->createForm(PreregisterType::class, $newuser);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newuser->setToken();

            $em = $this->getDoctrine()->getManager();
            $em->persist($newuser);
            $em->flush();

            $this->addFlash('success', 'Veuillez confirmer votre insrciption via le mail qui vous a été envoyé');

            $nom = $newuser->getNom();
            $mail = $newuser->getMail();
            $token = $newuser->getToken();



            $message = \Swift_Message::newInstance()
                    ->setSubject('Nouvelle inscription')
                    ->setFrom('admin@bien-etre.com')
                    ->setTo($mail)
                    ->setBody(
                    $this->renderView(
                            'public/internautes/mail.html.twig', array('newuser' => $newuser)
                    ), 'text/html'
            );
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/internautes/prenew.html.twig', [
                    'userForm' => $form->createView()]);
    }

    /**
     * Vérification du token et de l'id, ouverture du formulaire complet
     * avec les données préenregistrées
     * 
     * 
     * @Route("/internaute/new/{token}/{id}", name="confirm_internaute")
     * 
     */
    public function newAction(Request $request, $token = null, $id = null) {

            //récupération de l'utilisateur
            $newuser = $this->getDoctrine()->getManager()->getRepository('AppBundle:Preregister')->findOneById($id);



            //vérification token
            if ($token === $newuser->getToken()) {

                $user = new Utilisateur();
                $nom = $newuser->getNom();
                $user->setUsername($nom);
                $mail = $newuser->getMail();
                $user->setEmail($mail);
                $user->setTypeUser('internaute');
                $form = $this->createForm(UtilisateurType::class, $user);

                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();

                    $this->addFlash('success', "Vous êtes à présent enregistré en tant qu'internaute");

                    return $this->redirectToRoute('accueil');
                }

                return $this->render('/public/internautes/new.html.twig', array(
                            'userForm' => $form->createView()));
            } else {
                return $this->redirectToRoute('new_internaute', array(
                            "msg_error" => 'Votre inscription est invalidée pignouf !'
                ));
            }
        
    }

    /**
     * 
     * @Route("/internaute/update/{id}", name="internaute_update")
     */
    public function updateAction(Request $request, $id = null) {

        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($id);

        $form = $this->createForm(UtilisateurType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'update effectué avec succès');


            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/internautes/update.html.twig', [
                    'userForm' => $form->createView()]);
    }

}
