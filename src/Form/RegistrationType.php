<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('user_nom', TextType::class, [
            'attr' => [
                'placeholder' => "Nom",
                'class'=>"form-control"
            ]
        ])
        ->add('user_prenom', TextType::class, [
            'attr' => [
                'placeholder' => "Prénom",
                'class'=>"form-control"
            ]
        ])
        ->add('user_email', TextType::class, [
            'attr' => [
                'placeholder' => "Email",
                'class'=>"form-control"
            ]
        ])
        ->add('user_tel', TextType::class, [
            'attr' => [
                'placeholder' => "Tel",
                'class'=>"form-control"
            ]
        ])
        ->add('user_adresse', TextType::class, [
            'attr' => [
                'placeholder' => "Adresse",
                'class'=>"form-control"
            ]
        ])
        ->add('password',PasswordType::class, [
            'attr' => [
                'placeholder' => "password",
                'class'=>"form-control"
            ]
        ])
        ->add('user_cin', TextType::class, [
            'attr' => [
                'placeholder' => "CIN",
                'class'=>"form-control"
            ]
        ])
        ->add('user_matriculecnss', TextType::class, [
            'attr' => [
                'placeholder' => "Matricule CNSS",
                'class'=>"form-control"
            ]
        ])
        ->add('user_sex', ChoiceType::class, [
            'choices'  => [
                'Etat' => null,
                'Femme' => 'Femme',
                'Homme' => "Homme",
            ],
            'attr' => [
                'placeholder' => "Sex",
                'class'=>"form-control"
            ]
        ])
        ->add('roles', ChoiceType::class, [
            'choices'  => [
                'Admin' => 'ROLE_ADMIN',
                'Assistante' => 'ROLE_USER',
                'Patient' => "ROLE_Patient",
                'Kine' => "ROLE_kine",
            ],
           
            'expanded'=>true,
            'multiple'=>true,
            'label'=>'Roles'
        
        
        ])
    
;
         
      
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
