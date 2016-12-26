<?php

namespace AppBundle\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UtilisateurType;
use AppBundle\Form\PreregisterType;
use AppBundle\Entity\Preregister;
use AppBundle\Entity\Utilisateur;

class RecordController extends Controller {

    /**
     * Inscription des prestataires dans une table temporaire et envoi d'un mail de confirmation
     * 
     * @Route("/enregistrement", name="new_record")
     * 
     */
    public function preregister(Request $request, $typeuser='prestataire') {

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
            $typeuser=$newuser->getTypeUser();



            $message = \Swift_Message::newInstance()
                    ->setSubject('Nouvelle inscription')
                    ->setFrom('test@test.com')
                    ->setTo($mail)
                    ->setBody(
                    $this->renderView(
                            'records/mail.html.twig', array('newuser' => $newuser)
                    ), 'text/html'
            );
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('accueil');
        }

        return $this->render('records/prenew.html.twig', [
                    'userForm' => $form->createView()]);
    }

    /**
     * Vérification du token et de l'id, ouverture du formulaire complet
     * avec les données préenregistrées
     * 
     * 
     * @Route("/confirmation/{token}/{id}/{typeuser}", name="confirmation")
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
            $typeuser = $newuser->getTypeUser();
            $user->setTypeUser($typeuser);
//            $user->setTypeUser('prestataire');
            $user->setInscription(new DateTime('now'));
            $user->setNbessais(0);
            $user->setBanni(FALSE);
            $user->setInscriptionconf(TRUE);
            $user->setNewsletter(FALSE);

            $form = $this->createForm(UtilisateurType::class, $user);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {


//                $file = $user->getImages();
//                
//                $fileName = md5(uniqid()).'.'.$file->guessExtension();
//                
//                $file->move(
//                        $this->getParameter('images'),
//                        $fileName
//                        );
//                
//            $user->setImages($fileName);


                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'Vous êtes à présent enregistré en tant que prestataire de service');

                return $this->redirectToRoute('accueil');
            }

            return $this->render('/public/prestataires/new.html.twig', array(
                        'userForm' => $form->createView()));
        } else {
            return $this->redirectToRoute('new_prestataire', array(
                        "msg_error" => 'Votre inscription est invalidée pignouf !'
            ));
        }
    }

}
