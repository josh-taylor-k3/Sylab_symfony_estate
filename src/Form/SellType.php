<?php

namespace App\Form;

use App\Entity\ProprieteBien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SellType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', VichImageType::class, [
				'label' => 'Image de la propriété',
				'required' => false
			])
            ->add('name', TextType::class, [
            	'label' => 'Nom'
			])
            ->add('description', TextType::class, [
            	'label' => 'Description'
			])
            ->add('city', TextType::class, [
            	'label' => 'Ville'
			])
            ->add('address', TextType::class, [
            	'label' => 'Adresse'
			])
            ->add('zip_code', TextType::class, [
            	'label' => 'Code postal'
			])
            ->add('nbr_rooms', IntegerType::class, [
            	'label' => 'Nombre de chambres'
			])
            ->add('surface', IntegerType::class,[
            	'label' => 'Surface'
			])
            ->add('nbr_bedrooms', IntegerType::class, [
            	'label' => 'Nombre de chambres'
			])
            ->add('price', IntegerType::class, [
                'label' => 'Prix'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Vendre'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProprieteBien::class,
        ]);
    }
}
