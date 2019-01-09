<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BuyController extends AbstractController
{
	public function buyHome():Response
	{
		return $this->render('buy.html.twig', [
			'current_menu' => 'buy_properties'
		]);
	}
}

