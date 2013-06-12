<?php

namespace Carta\CartaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Carta\CartaBundle\Entity\Comandas;
use Carta\CartaBundle\Form\ComandasType;



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
        
        $tipo = $em->getRepository('CartaCartaBundle:Tipo')->findOneByid($id);
        $tiponombre = $tipo->getTipo();
        
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
                            'fotourl' => $fotourl,
                            'tiponombre'=>$tiponombre)
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
    
    public function comandasAction($plato, $comandarecivida = null){
        
        $em = $this->getDoctrine()->getManager();
        
        $eplato = $em->getRepository('CartaCartaBundle:Plato')->findOneByid($plato);
        $efoto = $em->getRepository('CartaCartaBundle:Foto')->findOneByid($eplato->getFotoId());
        $data = new \DateTime();
        
        if ($comandarecivida!=null){
            $ecomanda = $em->getRepository('CartaCartaBundle:Comanda')->findByid($comandarecivida);
            
            $comandanueva  = new Comandas();
            $comandanueva->setId($ecomanda->getId());
            
                    
            if ($eplato->getId()==$ecomanda->getplatoId()){
                $comandanueva->setPlatoId($eplato->getId());
            }
            $comandanueva->setCantidad(1);
            $comandanueva->setFecha($data);
            $comandanueva->setPrecioTotal(0);
        }else{
           
            echo $eplato->getId();
            $comanda  = new Comandas();
            $comanda->setPlatoId($eplato->getId());
            $comanda->setCantidad(1);
            $comanda->setFecha($data);
            $comanda->setPrecioTotal(0);
        }
        
        $em->persist($comanda);
        $em->flush();
        
        return $this->render('CartaCartaBundle:Default:presentacion.html.twig', 
                array('eplato' => $eplato,'efoto' => $efoto));
         
    }
}
?>