<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowController extends AbstractController {
	public function ShowHome() {
		return $this->render('show.html.twig');
	}
}