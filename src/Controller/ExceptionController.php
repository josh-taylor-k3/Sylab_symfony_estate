<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExceptionController extends AbstractController
{
	/**
	 * @return Response
	 */
	public function showException(FlattenException $exception):Response
	{	

        $code = $exception->getStatusCode();

		return $this->render('bundles/TwigBundle/Exception/error404.html.twig', [
            'status_code' => $code
        ]);
	}
}