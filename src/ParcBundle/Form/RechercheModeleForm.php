<?php

namespace ParcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RechercheModeleForm extends AbstractType{
 public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
    
        ->add('Libelle',TextType::class,
            [ 'label'=>'Libelle:',
              'attr'=> ['placeholder'=>'Tapez le Libelle ici']
            ])
        ;
    }
    }

?>