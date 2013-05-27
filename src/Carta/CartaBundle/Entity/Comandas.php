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
     * @var integer
     *
     * @ORM\Column(name="cliente_id", type="integer")
     */
    private $clienteId;


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
     * Set clienteId
     *
     * @param integer $clienteId
     * @return Comandas
     */
    public function setClienteId($clienteId)
    {
        $this->clienteId = $clienteId;
    
        return $this;
    }

    /**
     * Get clienteId
     *
     * @return integer 
     */
    public function getClienteId()
    {
        return $this->clienteId;
    }

     /**
     * @ORM\ManyToOne(targetEntity="Plato")
     * @ORM\JoinColumn(name="plato_id", referencedColumnName="id")
     * @return integer
     **/
    private $plato;
    public function setPlato(\Carta\CartaBundle\Entity\Plato $plato)
    {
        $this->plato = $plato;
    }

    public function getPlato()
    {
        return $this->plato;
    }

    /**
     * @ORM\OneToOne(targetEntity="Cliente")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     **/
    private $cliente;
    public function setCliente(\Carta\CartaBundle\Entity\Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function getCliente()
    {
        return $this->cliente;
    }
}