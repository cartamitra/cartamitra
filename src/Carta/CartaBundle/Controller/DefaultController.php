<?php

namespace Carta\CartaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CartaCartaBundle:Default:index.html.twig');
    }
    
     public function paginamenuAction()
    {
        return $this->render('CartaCartaBundle:Default:menu.html.twig');
    }
}
