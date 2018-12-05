<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BuyController extends AbstractController {
	public function buyHome() {
		return $this->render('buy.html.twig');
	}
}

