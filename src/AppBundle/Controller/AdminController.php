<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UtilisateurType;
use AppBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Categorie;
use AppBundle\Entity\Image;
use AppBundle\Form\CategorieType;
use AppBundle\Form\ImageType;

/**
 * 
 * @Security("is_granted('ROLE_ADMIN')")
 * 
 */
Class AdminController extends Controller {

    /**
     * 
     * @Route("/admin", name="admin")
     * 
     */
    public function adminAction() {


        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Utilisateur');

        $prestataire = $repo->findBy(['typeUser' => 'prestataire']);



        $internaute = $repo->findBy(['typeUser' => 'internaute']);



        return $this->render('admin/manage_users.html.twig', ['prestataire' => $prestataire, 'internaute' => $internaute]);
    }

    /**
     * 
     * @Route("/admin/ban_user/{user_id}", name="ban_user")
     */
    public function banUserAction($user_id) {



        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($user_id);

        $em = $this->getDoctrine()->getManager();

        $user->setBanni(true);

        $em->persist($user);

        $em->flush();


        return $this->redirectToRoute('admin');
    }

    /**
     * 
     * @Route("/admin/active_user/{user_id}", name="active_user")
     * 
     */
    public function activeUserAction($user_id) {

        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($user_id);

        $em = $this->getDoctrine()->getManager();

        $user->setBanni(false);

        $em->persist($user);

        $em->flush();


        return $this->redirectToRoute('admin');
    }

    /**
     * 
     * @Route("/admin/update_user/{user_id}", name="admin_user_update")
     */
    public function updateUserAction(Request $request, $id = null) {

        $id = $request->get('user_id');

        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($id);

        $password = $user->getPassword();

        $form = $this->createForm(UtilisateurType::class, $user);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('notice', 'update effectué avec succès');


            return $this->redirectToRoute('admin');
        }




        return $this->render('admin/update_user.html.twig', [
                    'userForm' => $form->createView(), 'id' => $id]);
    }

    /**
     * 
     * @Route("admin/categories/liste", name="admin_liste_categorie")
     */
    public function listCategAction() {


        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('AppBundle:Categorie');

        $categorie = $repo->findAll();



        return $this->render('admin/categories/list_categ.html.twig', ['categorie' => $categorie]);
    }

    /**
     * 
     * @Route("admin/categorie/new", name="new_categorie")
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

                $this->addFlash('success', 'Vous avez inséré une nouvelle catégorie');

                return $this->redirectToRoute('new_imgcateg', array('id' => $newcateg->getId()));
        }


        return $this->render('admin/categories/new.html.twig', [
                    'categForm' => $form->createView()
        ]);
    }

    /**
     * 
     * @Route("admin/categorie/update/{id}", name="update_categorie")
     */
    public function updateCategoryAction(Request $request, $id = null) {

        $id = $request->get('id');

        $categorie = $this->getDoctrine()->getManager()->getRepository('AppBundle:Categorie')->findOneById($id);
        $image = $categorie->getImage();

        $categories = $this->getDoctrine()->getRepository('AppBundle:Categorie')->findAll();

        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $categorie->setImage($image);
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            $this->addFlash('notice', 'update effectué avec succès');


            return $this->redirectToRoute('accueil');
        }
        return $this->render('admin/categories/update.html.twig', [
                    'categForm' => $form->createView(), 'id' => $id, 'categorie' => $categorie, 'categories' => $categories]);
    }

    /**
     * 
     * @Route("admin/categorie/delete/{id}", name="delete_categorie")
     * 
     */
    public function deleteAction($id = null) {

        $categorie = $this->getDoctrine()->getManager()->getRepository('AppBundle:Categorie')->findOneById($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($categorie);
        $em->flush();

        return $this->redirectToRoute('admin_liste_categorie');
    }

}
