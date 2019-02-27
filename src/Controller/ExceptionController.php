<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExceptionController extends AbstractController
{
	/**
	 * @return Response
	 */
	public function showException():Response
	{	
		return $this->render('bundles/TwigBundle/Exception/error404.html.twig');
	}
}