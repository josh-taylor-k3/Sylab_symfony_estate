<?php

namespace App\Controller;

use App\Entity\ProprieteBien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BuyController extends AbstractController
{
	public function buyHome():Response
	{
		$repo =  $this->getDoctrine()->getRepository('App:ProprieteBien');
		$propriete_bien = $repo->findAll();
		
		return $this->render('buy.html.twig', [
			'current_menu' => 'buy_properties',
			'proprieties' => $propriete_bien
		]);
	}
}

