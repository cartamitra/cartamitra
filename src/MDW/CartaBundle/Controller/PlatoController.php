<?php

namespace MDW\CartaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use MDW\CartaBundle\Entity\Platos;
use MDW\CartaBundle\Form\PlatoType; 

class PlatoController extends Controller
{
	public function listarAction()
	{
		$em = $this->getDoctrine()->getEntityManager();

		$platos = $em->getRepository('MDWCartaBundle:Platos')->findAll();

		return $this->render('MDWCartaBundle:plato:listar.html.twig', array('platos' => $platos));

	}

	public function crearAction()
	{
		$request = $this->getRequest();

		$plato = new Platos();
		$form = $this->createForm(new PlatoType(), $plato);

		if($request->getMethod() == 'POST')
    	{
    		$form->bind($request);

    		if($form->isValid())
        	{
        		
        		$em = $this->getDoctrine()->getEntityManager();
				$em->persist($plato);
				$em->flush();

        		return $this->redirect($this->generateURL('plato_crear'));
        	}
        }


		return $this->render('MDWCartaBundle:plato:crear.html.twig', array('form' => $form->createView(),));
	}

	public function editarAction()
	{

	}

	public function borrarAction()
	{

	}
}