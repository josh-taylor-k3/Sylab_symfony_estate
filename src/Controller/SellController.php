<?php

namespace App\Controller;

use App\Entity\ProprieteBien;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SellController extends AbstractController
{
	public function sellHome(Request $request):Response
	{
		$propriete_bien = new ProprieteBien();

		$form = $this->createFormBuilder($propriete_bien)
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
				'label' => 'Code Postal'
			])
			->add('nbr_rooms', IntegerType::class, [
				'label' => 'Nombre de pièces'
			])
			->add('surface', IntegerType::class, [
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
			->getForm();

		$form->handleRequest($request);

		// Check form
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

			$current_time = new \DateTime();
			// Recup data
            $formData = $form->getData();

            $propriete_bien->setName($formData->getName());
            $propriete_bien->setDescription($formData->getDescription());
            $propriete_bien->setCity($formData->getCity());
            $propriete_bien->setAddress($formData->getAddress());
            $propriete_bien->setZipCode($formData->getZipCode());
            $propriete_bien->setNbrRooms($formData->getNbrRooms());
            $propriete_bien->setSurface($formData->getSurface());
            $propriete_bien->setNbrBedrooms($formData->getNbrBedrooms());
            $propriete_bien->setPrice($formData->getPrice());
            $propriete_bien->setSold(0);
            $propriete_bien->setMakeAt($current_time);

            $em->persist($propriete_bien);
            $em->flush();

            return $this->redirectToRoute('home');
        }

		return $this->render('sell.html.twig', [
			'current_menu' => "sell_properties",
			'form' => $form->createView(),
		]);
	}
}