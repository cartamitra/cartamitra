<?php

namespace Carta\CartaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class DefaultController extends Controller
{
    
  
    
    
    public function indexAction()
    {
         return $this->render('CartaCartaBundle:Default:index.html.twig');
    }
    
    public function platosAction() {
         return $this->render('CartaCartaBundle:Default:platos.html.twig');
    }
    
    public function presentacionAction() {
         return $this->render('CartaCartaBundle:Default:presentacion.html.twig');
    }
}
