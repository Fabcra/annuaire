<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Image;
use AppBundle\Form\GalerieType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ImageController extends Controller {

    /**
     * 
     * @Route("/image/ajout/{id}", name="galerie_ajout")
     */
    public function imageAction(Request $request, $id = null) {

        $id = $request->get('id');
        $image = new Image();

        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($id);


        $form = $this->createForm(GalerieType::class, $image)
                ->add('envoyer', SubmitType::class);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                
            $image->setUtilisateur($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
//            $user->addImagesgalerie($image);
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($user);
//            $em->flush();
            $this->addFlash('success', 'image ajoutée');


            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/prestataires/image.html.twig', [
                    'userForm' => $form->createView(), 'id' => $id]);
    }

}
