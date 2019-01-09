<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SellController extends AbstractController {
	public function sellHome():Response {
		return $this->render('sell.html.twig');
	}
}