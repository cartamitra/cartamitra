<?php

namespace MDW\CartaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CartaCartaBundle:Default:index.html.twig');
    }
}
