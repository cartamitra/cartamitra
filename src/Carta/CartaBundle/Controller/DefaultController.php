<?php

namespace Carta\CartaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class DefaultController extends Controller
{
    
  
    
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartaCartaBundle:Tipo')->findAll();

        
         return $this->render(
                 'CartaCartaBundle:Default:index.html.twig', 
                 array('entities' => $entities) 
         );
    }
    
    public function platosAction() {
         return $this->render('CartaCartaBundle:Default:platos.html.twig');
    }
    
    public function presentacionAction() {
         return $this->render('CartaCartaBundle:Default:presentacion.html.twig');
    }
}
