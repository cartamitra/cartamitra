<?php

namespace Carta\CartaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comandas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Carta\CartaBundle\Entity\ComandasRepository")
 */
class Comandas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * 
     * @ORM\Column(name="plato_id", type="integer")
     */
    private $platoId;

    /**
     * @var float
     * 
     * @ORM\Column(name="cantidad", type="float")
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="preciototal", type="float")
     */
    private $preciototal;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comanda", type="string", length=15)
     */
    private $comanda;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
     public function setId($Id)
    {
        $this->Id = $Id;
    
        return $this;
    }

    /**
     * Set platoId
     *
     * @param integer $platoId
     * @return Comandas
     */
    public function setPlatoId($platoId)
    {
        $this->platoId = $platoId;
    
        return $this;
    }

    /**
     * Get platoId
     *
     * @return integer 
     */
    public function getPlatoId()
    {
        return $this->platoId;
    }

    /**
     * Set cantidad
     *
     * @param float $cantidad
     * @return Comandas
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return float 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Comandas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
     /**
     * Set preciototal
     *
     * @param float $preciototal
     * @return Comandas
     */
    public function setpreciototal($preciototal)
    {
        $this->preciototal = $preciototal;
    
        return $this;
    }

    /**
     * Get preciototal
     *
     * @return float 
     */
    public function getpreciototal()
    {
        return $this->preciototal;
    }
    
    /**
     * Set comanda
     *
     * @param string $preciototal
     * @return Comandas
     */
    public function setcomanda($comanda)
    {
        $this->comanda = $comanda;
    
        return $this;
    }

    /**
     * Get comanda
     *
     * @return string
     */
    public function getcomanda()
    {
        return $this->comanda;
    }
    
    
     
}