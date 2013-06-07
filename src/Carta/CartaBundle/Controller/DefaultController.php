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
    
    public function platosAction($id) {
         
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartaCartaBundle:Plato')->findByTipo($id);
        
        return $this->render(
                 'CartaCartaBundle:Default:platos.html.twig', 
                 array('entities' => $entities)
        );
    }
    
    public function presentacionAction($id) {
         $em = $this->getDoctrine()->getManager();
         
         $entidadplato = new \Carta\CartaBundle\Entity\Plato;
         
         $entities = $em->getRepository('CartaCartaBundle:Plato')->findOneByid($id);
         
         $entidadplato = $entities;
         $idfoto = $entidadplato->getFotoId();
         
         $entities2 = $em->getRepository('CartaCartaBundle:Foto')->findOneByid($idfoto);
         
         return $this->render('CartaCartaBundle:Default:presentacion.html.twig', 
                 array('entities' => $entities,
                       'entities2' => $entities2)
         );
         
    }
}
?>