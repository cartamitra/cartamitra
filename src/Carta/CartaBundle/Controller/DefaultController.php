<?php

namespace Carta\CartaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;



class DefaultController extends Controller
{
    
   /**
     * Pagina Principal
     *
     * @Route("/", name="pagina")
     * @Method("GET")
     * @Template("CartaCartaBundle:Default:menu.html.twig")
     */
    
    
    public function indexAction()
    {
        return array();
    }
}
