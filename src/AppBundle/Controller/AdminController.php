<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UtilisateurType;
use AppBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * @Security("is_granted('ROLE_ADMIN')")
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
        
        $password=$user->getPassword();
        
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

}
