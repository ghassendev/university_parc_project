<?php

namespace ParcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RechercheVoitureForm extends AbstractType{
 public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
    
        ->add('serie',TextType::class,
            [ 'label'=>'N° de serie:',
              'attr'=> ['placeholder'=>'Tapez le n° de serie ici']
            ])
        ;
    }
    }

?>