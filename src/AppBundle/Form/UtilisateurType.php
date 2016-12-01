<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('username')
                ->add('email')
                ->add('password')
                ->add('adresse')
                ->add('adressenum')
                ->add('typeUser')
                ->add('inscription')
                ->add('nbessais')
                ->add('banni')
                ->add('inscriptionconf')
                ->add('site')
                ->add('numtel')
                ->add('numtva')
                ->add('newsletter')
                ->add('slug')
                ->add('isActive')
                ->add('codePostal')
                ->add('localite')
                ->add('commune')
                ->add('categories');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Utilisateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_utilisateur';
    }


}
