<?php

namespace App\Controller;

use App\Entity\ProprieteBien;
use App\Form\ProprieteType;
use App\Repository\ProprieteBienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AdminProprieteController extends AbstractController
{
	/**
	 * @var ProprieteBienRepository
	 */
	private $repository;

	// Recuperation du repo par injection
	public function __construct(ProprieteBienRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * @return Response
	 */
	public function index():Response
	{
		$property = $this->repository->findAll();
		return $this->render('admin/index.html.twig', [
			'properties' => $property
		]);
	}

	public function addBien()
	{
		return $this->render('admin/add.html.twig');
	}

	/**
	 * @param ProprieteBien $proprieteBien
	 * @return Response
	 */
	public function editBien(ProprieteBien $proprieteBien)
	{
		// Form -> PropertyType
		$form = $this->createForm(ProprieteType::class, $proprieteBien);
		return $this->render('admin/edit.html.twig', [
			'proprieteBien' => $proprieteBien,
			'form' => $form->createView()
		]);
	}

}