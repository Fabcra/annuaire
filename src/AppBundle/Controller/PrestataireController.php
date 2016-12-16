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

class PrestataireController extends Controller {

    /**

     * @Route("/recherche_prestataires", name="recherche_prestataires")

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

    /**
     * 
     * @Route("/public/prestataires/{slug}", name="show_prestataire")
     */
    public function showAction($slug) {
        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');

        $nomPresta = $repo->findOneBy(['slug' => $slug]);
        $categ = $repocateg->findAll();

        return $this->render('public/prestataires/public_prestataire.html.twig', ['presta' => $nomPresta, 'categorie' => $categ]);
    }

    /**
     * 
     * @Route("/liste_prestataires_par_categorie/{slug}", name="liste_prestataires_categorie")
     * */
    public function listbycategorie($slug) {

        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');

        $utilisateur = $repo->findBy(['typeUser' => 'prestataire']);
        $categ = $repocateg->findByNomCategorie(['slug' => $slug]);





        return $this->render('public/prestataires/prestataires_by_categorie.html.twig', ['categorie' => $categ[0], 'prestataire' => $utilisateur]);
    }

    /**
     * Inscription des prestataires dans une table temporaire et envoi d'un mail de confirmation
     * 
     * @Route("/prestataire/preregister", name="new_prestataire")
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
                    ->setFrom($mail)
                    ->setTo('test@test.com')
                    ->setBody(
                    $this->renderView(
                            'public/Prestataires/mail.html.twig', array('newuser' => $newuser)
                    ), 'text/html'
            );
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/prestataires/prenew.html.twig', [
                    'userForm' => $form->createView()]);
    }

    /**
     * Vérification du token et de l'id, ouverture du formulaire complet
     * avec les données préenregistrées
     * 
     * 
     * @Route("/prestataires/new/{token}/{id}", name="confirm_prestataire")
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
            $user->setTypeUser('prestataire');
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

    /**
     * 
     * @Route("/prestataire/update/{id}", name="prestataire_update")
     */
    public function updateAction(Request $request, $id = null) {

        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($id);

        $form = $this->createForm(UtilisateurType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'update effectué avec succès');


            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/prestataires/update.html.twig', [
                    'userForm' => $form->createView()]);
    }

}
