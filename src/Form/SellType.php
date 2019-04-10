<?php

namespace App\Form;

use App\Entity\ProprieteBien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SellType extends AbstractType
{
<<<<<<< HEAD
=======
    private function getConfig(string $label, $required = true){
        return [
            'label' => $label,
            'required' => $required
        ];
    }
>>>>>>> 32c80673437b8372293c7739257f3455c430ac4a

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
<<<<<<< HEAD
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
=======
            ->add('imageFile', VichImageType::class, $this->getConfig("Image de la Propriété", false))
            ->add('name', TextType::class,  $this->getConfig('Nom'))
            ->add('description', TextType::class, $this->getConfig('Description'))
            ->add('city', TextType::class, $this->getConfig('Ville'))
            ->add('address', TextType::class, $this->getConfig('Adresse'))
            ->add('zip_code', TextType::class, $this->getConfig('Code Postal'))
            ->add('nbr_rooms', IntegerType::class, $this->getConfig('Nombre de pièces'))
            ->add('surface', IntegerType::class, $this->getConfig('Surface'))
            ->add('nbr_bedrooms', IntegerType::class, $this->getConfig('Nombre de chambres'))
            ->add('price', MoneyType::class, $this->getConfig('Prix'))
>>>>>>> 32c80673437b8372293c7739257f3455c430ac4a
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
