<?php

namespace App\Form;

use App\Entity\ProprieteBienSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProprieteBienSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrice', IntegerType::class, [
            	'required' => false,
				'label' => false,
				'attr' => [
					'placeholder' => 'Budget max'
				]
			])
            ->add('minSurface', IntegerType::class, [
				'required' => false,
				'label' => false,
				'attr' => [
					'placeholder' => 'Surface min'
				]
			])
            ->add('minRooms', IntegerType::class, [
				'required' => false,
				'label' => false,
				'attr' => [
					'placeholder' => 'Nombre de pièce min'
				]
			])
            ->add('minBedrooms', IntegerType::class, [
				'required' => false,
				'label' => false,
				'attr' => [
					'placeholder' => 'Nombre de chambre min'
				]
			])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProprieteBienSearch::class,
			'method' => 'get',
			'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
	{
		return '';
	}
}
