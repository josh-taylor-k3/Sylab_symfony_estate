<?php

namespace App\Controller;

use App\Repository\ProprieteBienRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
	 * @param $id
	 * @return Response
	 */
	public function showBienById($id):Response
	{

		$propriete_bien = $this->repository->find($id);

		return $this->render('show.html.twig', [
			'propriety' => $propriete_bien
		]);
	}
}