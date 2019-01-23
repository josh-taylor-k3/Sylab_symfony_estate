<?php

namespace App\Controller;

use App\Entity\ProprieteBien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
	public function home():Response
	{
		$repo =  $this->getDoctrine()->getRepository('App:ProprieteBien');
		$propriete_bien = $repo->latestBien();
		
		return $this->render('home.html.twig', [
            'proprieties' => $propriete_bien
        ]);
	}
}