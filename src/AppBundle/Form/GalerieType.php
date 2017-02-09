<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GalerieType extends AbstractType {
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        
        $builder->add('url')
    ;
    }
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array(
            
            'data_class' => \AppBundle\Entity\Image::class,
          
        ));
    }
    
    
}

