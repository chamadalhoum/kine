<?php

namespace App\Form;

use App\Entity\Dossiermedicale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
class DossiermedicaleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medicaux')
            ->add('chirurgie')
            ->add('allergie')
            ->add('document')
            ->add('photos',FileType::class,array('label'=>'Choisissez Votre fichier','multiple'=>true,'mapped'=>false,'required'=>false))
            ->add('analyse')
            ->add('radio')
            ->add('patient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dossiermedicale::class,
        ]);
    }
}
