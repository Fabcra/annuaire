<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromotionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
                ->add('description')
                ->add('categorie')
                ->add('documentPDF')
                ->add('debut', DateType::class, [
                    'widget'=>'single_text',
                    'attr'=>[
                        'class'=>'js-datepicker',
                    ],
                    'html5'=>false,
                ])
                ->add('fin', DateType::class, [
                    'widget'=>'single_text',
                    'attr'=>[
                        'class'=>'js-datepicker',
                    ],
                    'html5'=>false,
                ])
                ->add('affichageDe', DateType::class, [
                    'widget'=>'single_text',
                    'attr'=>[
                        'class'=>'js-datepicker',
                    ],
                    'html5'=>false,
                ])
                ->add('affichageJusque', DateType::class, [
                    'widget'=>'single_text',
                    'attr'=>[
                        'class'=>'js-datepicker',
                    ],
                    'html5'=>false,
                ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Promotion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_promotion';
    }


}
