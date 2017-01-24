<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StageType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom')
                ->add('description')
                ->add('tarif')
                ->add('infoCompl')
                ->add('hdebut', DateType::class, [
                    'widget'=>'single_text',
                    'attr'=>[
                        'class'=>'js-datepicker',
                    ],
                    'html5'=>false,
                ])
                ->add('hfin', DateType::class, [
                    'widget'=>'single_text',
                    'attr'=>[
                        'class'=>'js-datepicker'
                    ],
                    'html5'=>false,
                ])
                
                ->add('affichageDe', DateType::class, [
                    'widget'=>'single_text',
                    'attr'=>[
                        'class'=>'js-datepicker'
                    ],
                    'html5'=>false,
                ])
                ->add('affichageJusque', DateType::class, [
                    'widget'=>'single_text',
                    'attr'=>[
                        'class'=>'js-datepicker'
                    ],
                    'html5'=>false,
                ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Stage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_stage';
    }

}
