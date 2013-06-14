<?php

namespace Carta\CartaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Carta\CartaBundle\Entity\Comandas;
use Carta\CartaBundle\Entity\mesa;
use Carta\CartaBundle\Form\mesasType;


class DefaultController extends Controller
{
    
    public function indexAction(Request $request){
        
        $entity  = new mesa();
        $form = $this->createFormBuilder($entity)
                ->add('mesa', 'entity', array( 'class' => 'CartaCartaBundle:mesa', 'property' => 'mesa',))
                ->getForm();
        
        
        
        if($request->getMethod() == 'POST')
        {       
                echo $cache = $request->getContent();
                $datos = explode("%", $cache) ;
                $cadena = $datos[2];
                $cadena = substr($cadena,3 ,2);
                
                if($cadena[1] == "&")
                {
                    $cadena = substr($cadena,0 ,1);
                    $numero = (int)$cadena - 1;
                    $cadena = (string)$numero;
                    $cadena = "0".$cadena;
                }else{
                    $numero = (int)$cadena - 1;
                    $cadena = (string)$numero;
                }
                
                if($cadena == "9"){
                    $cadena = "0".$cadena;
                }
                $identificadorcomanda =  $cadena.date('dmYHi');
                return $this->redirect($this->generateUrl('principal', array('idmesa' => $identificadorcomanda)));            
                
        
        }

        return $this->render('CartaCartaBundle:Default:mesa.html.twig', array(
            
            'form'   => $form->createView()
        ));
        
       
    }
    
    public function principalAction(){
        
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('CartaCartaBundle:Tipo')->findAll();
        
        return $this->render(
                 'CartaCartaBundle:Default:principal.html.twig', 
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
    
    public function comandasAction($plato, $mesa = "01"){
        
        $em = $this->getDoctrine()->getManager();
        
        $eplato = $em->getRepository('CartaCartaBundle:Plato')->findOneByid($plato);
        $efoto = $em->getRepository('CartaCartaBundle:Foto')->findOneByid($eplato->getFotoId());
        $data = new \DateTime();
        $identificadorcomanda = $mesa . date('dmYHi');
        /*
        
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
        }*/
        
        $comanda  = new Comandas();
        $comanda->setPlatoId($eplato->getId());
        $comanda->setCantidad(1);
        $comanda->setFecha($data);
        $comanda->setPrecioTotal($eplato->getPrecio());
        $comanda->setcomanda($identificadorcomanda);
        
        $em->persist($comanda);
        $em->flush();
        
        return $this->render('CartaCartaBundle:Default:presentacion.html.twig', 
                array('eplato' => $eplato,'efoto' => $efoto));
         
    }
    
    public function fincomandaAction(){
        
       
        return $this->render('CartaCartaBundle:Default:fincomanda.html.twig');
         
    }
}
?>