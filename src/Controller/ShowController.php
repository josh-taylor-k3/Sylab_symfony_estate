<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends AbstractController
{
	/**
	 * @param $id
	 * @return Response
	 */
	public function showHome($id):Response
	{
		$repo =  $this->getDoctrine()->getRepository('App:ProprieteBien');
		$propriete_bien = $repo->find($id);

		return $this->render('show.html.twig', [
			'propriety' => $propriete_bien
		]);
	}
}