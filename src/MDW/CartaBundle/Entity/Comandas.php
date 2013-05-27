<?php

namespace MDW\CartaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comandas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MDW\CartaBundle\Entity\ComandasRepository")
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
     * @ORM\Column(name="num_factura", type="integer")
     */
    private $numFactura;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_platos", type="integer")
     */
    private $idPlatos;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="mesa", type="integer")
     */
    private $mesa;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numFactura
     *
     * @param integer $numFactura
     * @return Comandas
     */
    public function setNumFactura($numFactura)
    {
        $this->numFactura = $numFactura;
    
        return $this;
    }

    /**
     * Get numFactura
     *
     * @return integer 
     */
    public function getNumFactura()
    {
        return $this->numFactura;
    }

    /**
     * Set idPlatos
     *
     * @param integer $idPlatos
     * @return Comandas
     */
    public function setIdPlatos($idPlatos)
    {
        $this->idPlatos = $idPlatos;
    
        return $this;
    }

    /**
     * Get idPlatos
     *
     * @return integer 
     */
    public function getIdPlatos()
    {
        return $this->idPlatos;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
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
     * @return integer 
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
     * Set mesa
     *
     * @param integer $mesa
     * @return Comandas
     */
    public function setMesa($mesa)
    {
        $this->mesa = $mesa;
    
        return $this;
    }

    /**
     * Get mesa
     *
     * @return integer 
     */
    public function getMesa()
    {
        return $this->mesa;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Platos", inversedBy="comandas")
     * @ORM\JoinColumn(name="idplatos", referencedColumnName="id")
     * @return integer
     */
    private $plato;
    public function setplato(\Mdw\CartaBundle\Entity\Platos $plato)
    {
        $this->plato = $plato;
    }

    public function getplato()
    {
        return $this->plato;
    }
}
