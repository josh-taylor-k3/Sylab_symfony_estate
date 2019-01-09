<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends AbstractController {
	public function showHome() {
		return $this->render('show.html.twig', [
			'current' => "sell_properties"
		]);
	}
}