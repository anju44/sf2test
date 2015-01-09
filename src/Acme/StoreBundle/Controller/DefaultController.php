<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Store:index.html.twig', array(
        	'name' => $name));
    }

    public function createAction()
    {
    	$product = new Product();
    	$product->setName('A Foo Bar');
    	$product->setPrice('19.99');
    	$product->setDescription('Lorem ipsum dolor');

    	$em = $this->getDoctrine()->getManager();
    	$em->persist($product);
    	$em->flush();

    	return new Response('Id du produit créé :' .$product->getId());
    }

    public function showAction($id, $name)
    {
        // die('showAction:' . sprintf("%s %s", $id, $name));
        $product = $this->getDoctrine()
            ->getRepository('AcmeStoreBundle:Product')
            ->find($id);

        if(!$product)
        {
            throw $this->createNotFoundException(
                'Aucun produit trouvé pour cet id :'.$id
                );
        }

        return $this->render('AcmeStoreBundle:Store:index.html.twig', array(
                'id' => $id,
                'name' => $name,
            ));
    }

    public function updateAction($id)
    {
        // die('updateAction');
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AcmeStoreBundle:Product')->find($id);

        if (!$product) { 
            throw $this->createNotFoundException(
                'Aucun produit trouvé pour cet id : '.$id
            );
        }

        $product->setName('Nom du nouveau produit!');
        $em->flush();

        return $this->redirect($this->generateUrl('homepage'));
    }
}
