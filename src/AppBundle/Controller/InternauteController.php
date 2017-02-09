<?php
// MODIFICATION DU PROFIL INTERNAUTE (PASSWORD INCLU)
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UtilisateurType;
use AppBundle\Entity\Utilisateur;

class InternauteController extends Controller {

   
    /**
     * 
     * @Route("/internaute/update/{id}", name="internaute_update")
     */
    public function updateAction(Request $request, $id = null) {

        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($id);

        $form = $this->createForm(UtilisateurType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $user->setTypeUser('internaute');

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
