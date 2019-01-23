<?php

namespace App\Form;

use App\Entity\ProprieteBien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProprieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('city')
            ->add('address')
            ->add('zip_code')
            ->add('nbr_rooms')
            ->add('surface')
            ->add('nbr_bedrooms')
            ->add('price')
            ->add('sold')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProprieteBien::class,
        ]);
    }
}
