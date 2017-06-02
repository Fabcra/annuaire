<?php

//GESTION DES CATEGORIES DE SERVICES

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CategorieType;
use AppBundle\Entity\Image;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CategorieController extends Controller {
    
    
    /**
     * 
     * @Route("categorie/new", name="ask_new_categorie")
     * 
     */
    public function newCategoryAction(Request $request) {

        $newcateg = new Categorie();

        $image = new Image();

        $prestataire = $this->getUser();


        $form = $this->createForm(CategorieType::class, $newcateg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $newcateg->setImage($image);

            $newcateg->addUtilisateur($prestataire);
            $em = $this->getDoctrine()->getManager();
            $em->persist($newcateg);
            $em->flush();

            $this->addFlash('success', "Vous avez envoyé une demande d'insertion de catégorie, celle-ci sera traitée dans les plus brefs délais" );

            $nom = $prestataire->getUsername();
            $mail = $prestataire->getEmail();
            
            $message = \Swift_Message::newInstance()
                    ->setSubject('Demande de nouvelle catégorie')
                    ->setFrom($mail)
                    ->setTo('admin@annuaire.com')
                    ->setbody(
                            $this->renderView('public/categories/mail.html.twig', array('categorie'=>$newcateg)
                                    ), 'text/html'
                            );
            
                            $this->get('mailer')->send($message);
                    
            
           
            return $this->redirectToRoute('new_imgcateg', array('id' => $newcateg->getId()));
        }


        return $this->render('public/categories/new.html.twig', [
                    'categForm' => $form->createView()
        ]);
    }
    
    
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
