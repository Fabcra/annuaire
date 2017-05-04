<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Image;
use AppBundle\Form\ImageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Categorie;

class ImageController extends Controller {

    /**
     * 
     * @Route("/image/ajout/{id}", name="galerie_ajout")
     */
    public function imageAction(Request $request, $id = null) {

        $id = $request->get('id');
        $image = new Image();

        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneById($id);


        $form = $this->createForm(ImageType::class, $image)
                ->add('envoyer', SubmitType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $file = $image->getUrl();

            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move(
                    $this->getParameter('images'), $fileName
            );

            $image->setUtilisateur($user);
            $image->setUrl($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            $this->addFlash('success', 'image ajoutée');


            return $this->redirectToRoute('accueil');
        }

        return $this->render('public/prestataires/image.html.twig', [
                    'userForm' => $form->createView(), 'id' => $id]);
    }

    /**
     * 
     * @param Request $request
     * @Route("/image/new/{slug}", name="new_image")
     * 
     */
    public function insertImage(Request $request, $slug) {

        $image = new Image();
        $user = $this->getDoctrine()->getManager()->getRepository('AppBundle:Utilisateur')->findOneBy(['slug' => $slug]);

        $typeuser = $user->getTypeUser();



        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $image->getUrl();

            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move(
                    $this->getParameter('images'), $fileName
            );

            $image->setUrl($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);

            $em->flush();

            if ($typeuser == "prestataire") {
                $user->setLogo($image);
            } else if ($typeuser == "internaute") {
                $user->setAvatar($image);
            }
            $em->persist($user);
            $em->flush();

            if ($typeuser == "prestataire") {
                return $this->redirectToRoute("prestataire_update", array('id' => $user->getId()));
            }

            if ($typeuser == "internaute") {
                return $this->redirectToRoute("internaute_update", array('id' => $user->getId()));
            }
        }

        return $this->render('public/prestataires/insertimage.html.twig', [
                    'imageForm' => $form->createView(), 'slug' => $slug
        ]);
    }

    
    /**
     * 
     * @Route("image/new_imgcateg/{id}", name="new_imgcateg")
     * 
     */
    public function imageCateg(Request $request, $id) {

        $id = $request->get('id');
        
        $image = new Image();

        $categorie = $this->getDoctrine()->getManager()->getRepository('AppBundle:Categorie')->findOneBy(['id' => $id]);


        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $image->getUrl();

            $filename = md5(uniqid()) . '.' . $file->guessExtension();

            $file->move(
                    $this->getParameter('images'), $filename
            );


            $image->setUrl($filename);

            $em = $this->getDoctrine()->getManager();
            $em->persist($image);

            $em->flush();
            
            $categorie->setImage($image);
            
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute("update_categorie", array('id'=>$categorie->getId()));
        }

        return $this->render('public/prestataires/insertimage.html.twig', [
                    'imageForm' => $form->createView(), 'id' => $id
        ]);
    }

}
