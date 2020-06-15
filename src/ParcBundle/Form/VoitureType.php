<?php

namespace ParcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VoitureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('serie',TextType::class,
        [
            'attr'=>['placeholder'=>'Ecriver le nom du serie']

      ]  )
        

        ->add('dateMiseCirculation',DateType::class,
        [
            'label'=>'Date mise en circulation'
        ])
        ->add('marque')
        ->add('modele',EntityType::class, array(

            'class' => 'ParcBundle:Modele',
            'choice_label' => 'libelle',
            'mapped'=>false,
            'choice_value'=>'id'
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ParcBundle\Entity\Voiture'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'parcbundle_voiture';
    }


}
