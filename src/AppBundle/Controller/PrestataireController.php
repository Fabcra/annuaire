<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UtilisateurType;

class PrestataireController extends Controller {

    /**

     * @Route("/recherche_prestataires", name="recherche_prestataires")

     */
    public function listAction(Request $request) {

        $params = $request->request->all();

        $doctrine = $this->getDoctrine();

        $repo = $doctrine->getRepository('AppBundle:Utilisateur');
        $repocateg = $doctrine->getRepository('AppBundle:Categorie');
        
        $prestataires= $repo->search($params);
       
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

        $utilisateur = $repo->findBy(['typeUser'=>'prestataire']);
        $categ = $repocateg->findByNomCategorie(['slug'=>$slug]);
        
        
        
        
            
        return $this->render('public/prestataires/prestataires_by_categorie.html.twig', ['categorie' => $categ[0], 'prestataire'=>$utilisateur]);
      
        }
        
        /**
         * @Route("/utilisateur/new", name="new_user")
         */
        public function newAction(Request $request){
            
            $form = $this->createForm(UtilisateurType::class);
            
            if($form->isSubmitted() && $form->isValid()){
                
            }
            
            return $this->render('public/prestataires/new.html.twig',[
            'userForm' => $form->createView()]); 
            
        }
                
    


}
