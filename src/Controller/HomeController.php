<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\ProprieteBien;
use App\Form\ContactType;
use App\Repository\ProprieteBienRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

	/**
	 * @var ProprieteBienRepository
	 */
	private $repository;

	/**
	 * @var ObjectManager
	 */
	private $em;

	// Recuperation du repo par injection #C'estPlusSimple <3
	public function __construct(ProprieteBienRepository $repository, ObjectManager $em)
	{
		$this->repository = $repository;
		$this->em = $em;
	}

	/**
	 * @return Response
	 */
	public function home():Response
	{
		$propriete_bien = $this->repository->latestBien();
		
		return $this->render('home.html.twig', [
            'properties' => $propriete_bien
        ]);
	}

	/**
	 * @return Response
	 */
	public function buyHome():Response
	{
		$propriete_bien = $this->repository->findAll();
		
		return $this->render('buy.html.twig', [
			'current_menu' => 'buy_properties',
			'properties' => $propriete_bien
		]);
	}

	/**
	 * @param ProprieteBien $proprieteBien
	 * @param Request $request
	 * @param ContactNotification $contactNotification
	 * @param $id
	 * @return Response
	 * @throws \Twig_Error_Loader
	 * @throws \Twig_Error_Runtime
	 * @throws \Twig_Error_Syntax
	 */
	public function showBienById(ProprieteBien $proprieteBien, Request $request, ContactNotification $contactNotification, $id):Response
	{
		$propriete_bien = $this->repository->find($id);

		// Instance new contact
		$contact = new Contact();
		// On set le bien dans lequel nous sommes
		$contact->setProprieteBien($proprieteBien);

		$form = $this->createForm(ContactType::class, $contact);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid())
		{
			// Send notification
			$contactNotification->notification($contact);
			// Add flash message
			$this->addFlash('success', 'Votre email à été bien envoyer');
		}

		return $this->render('show.html.twig', [
			'propriety' => $propriete_bien,
			'form' => $form->createView()
		]);
	}
}