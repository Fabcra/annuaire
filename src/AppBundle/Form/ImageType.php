<?php



namespace AppBundle\Form;

use AppBundle\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ImageType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        //$builder->add('url')
       $builder
               ->add('url',FileType::class, array('data_class'=>null))
               ->add('id')
        ;
    }
    public function configureOptions(OptionsResolver $resolver){
       
        
        
        $resolver->setDefaults(array(
            'data_class' => \AppBundle\Entity\Image::class,
        ));
    }
}   