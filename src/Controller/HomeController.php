<?php

namespace App\Controller;

use App\Entity\ProprieteBien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
	/**
	 * @return Response
	 */
	public function home():Response
	{
		$repo =  $this->getDoctrine()->getRepository('App:ProprieteBien');
		$propriete_bien = $repo->latestBien();
		
		return $this->render('home.html.twig', [
            'properties' => $propriete_bien
        ]);
	}

	/**
	 * @return Response
	 */
	public function buyHome():Response
	{
		$repo =  $this->getDoctrine()->getRepository('App:ProprieteBien');
		$propriete_bien = $repo->findAll();
		
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
		$repo =  $this->getDoctrine()->getRepository('App:ProprieteBien');
		$propriete_bien = $repo->find($id);

		return $this->render('show.html.twig', [
			'propriety' => $propriete_bien
		]);
	}
}