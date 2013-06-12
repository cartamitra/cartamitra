<?php

namespace Carta\CartaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;




class DefaultController extends Controller
{
    
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartaCartaBundle:Tipo')->findAll();
        
        return $this->render(
                 'CartaCartaBundle:Default:index.html.twig', 
                 array('entities' => $entities) 
        );
    }
    
    public function platosAction($id) {
         
        $em = $this->getDoctrine()->getManager();
        
        $eplato = $em->getRepository('CartaCartaBundle:Plato')->findByTipo($id);
        
        //$query = $em->createQuery(
        //         'select f.url from CartaCartaBundle:Foto f where f.id in (select p.fotoId from CartaCartaBundle:Plato p where p.tipoId = :id)'
        //         )->setParameter('id', $id);
        // echo $fotos = $query->getResult();
        
        foreach ($eplato as $ar ){
            $efoto = $em->getRepository('CartaCartaBundle:Foto')->findOneByid($ar->getfotoid());
            $fotourl[] = $efoto->geturl();
        }
        
        
        return $this->render('CartaCartaBundle:Default:platos.html.twig', 
                       array('eplato' => $eplato,
                            'fotourl' => $fotourl)
        );
    }
    
    public function presentacionAction($id) {
        
         $em = $this->getDoctrine()->getManager();
         
         $eplato = $em->getRepository('CartaCartaBundle:Plato')->findOneByid($id);
         
         $idfoto = $eplato->getFotoId();
         
         $efoto = $em->getRepository('CartaCartaBundle:Foto')->findOneByid($idfoto);
         
         return $this->render('CartaCartaBundle:Default:presentacion.html.twig', 
                 array('eplato' => $eplato,
                       'efoto' => $efoto)
         );
         
    }
}
?>