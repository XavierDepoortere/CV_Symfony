<?php

namespace App\Form;


use App\Entity\Language;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('language', EntityType::class, [  
            'class' => Language::class,  
            'choice_label' => 'name',
            'label' => false,
            'required' => true, 
            'expanded' => true,
            'multiple'=>false,
            
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
}
