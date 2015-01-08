<?php
	namespace Acme\HelloBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Response;

	class HelloController extends Controller
	{
		public function indexAction($first_name, $last_name, $color)
		{
			// return new Response('<html><body>Hello '. sprintf("%s %s", $first_name, $last_name) .'!</body></html>');
			//return $this->redirect($this->generateUrl('homepage'), 301);

			return $this->render(
    			'AcmeHelloBundle:Hello:index.html.twig',
    			array('first_name' => $first_name,
				'last_name' => $last_name,
				'color' => $color));		

			// récupérer l'objet depuis la base de données
			$product = 'truc';
			if (!$product)
			{
				thorw $this->createNotFoundException('Le produit n\'existe pas');
			}
			return $this->render('truc');
		}
	}
