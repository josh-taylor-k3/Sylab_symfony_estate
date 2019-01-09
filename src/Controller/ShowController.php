<?php

namespace App\Controller;

use App\Entity\ProprieteBien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends AbstractController {
	public function showHome($id) {

		$repo =  $this->getDoctrine()->getRepository('App:ProprieteBien');
		$propriete_bien = $repo->find($id);

		return $this->render('show.html.twig', [
			'current' => "sell_properties",
			'propriety' => $propriete_bien
		]);
	}
}