<?php

namespace MDW\CartaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MDWCartaBundle:Default:index.html.twig', array('name' => $name));
    }
}
