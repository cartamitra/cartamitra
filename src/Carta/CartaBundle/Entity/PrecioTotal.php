<?php

namespace Carta\CartaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrecioTotal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Carta\CartaBundle\Entity\PrecioTotalRepository")
 */
class PrecioTotal
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
     * @ORM\Column(name="tipoPrecio", type="integer")
     */
    private $tipoPrecio;

    /**
     * @var integer
     *
     * @ORM\Column(name="platoId", type="integer")
     */
    private $platoId;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;


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
     * Set tipoPrecio
     *
     * @param integer $tipoPrecio
     * @return PrecioTotal
     */
    public function setTipoPrecio($tipoPrecio)
    {
        $this->tipoPrecio = $tipoPrecio;
    
        return $this;
    }

    /**
     * Get tipoPrecio
     *
     * @return integer 
     */
    public function getTipoPrecio()
    {
        return $this->tipoPrecio;
    }

    /**
     * Set platoId
     *
     * @param integer $platoId
     * @return PrecioTotal
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
     * Set precio
     *
     * @param float $precio
     * @return PrecioTotal
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    
        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoPrecio")
     * @ORM\JoinColumn(name="tipoprecio", referencedColumnName="id")
     * @return integer
     **/
    private $tipoprecios;
    public function setTipo_precio(\Carta\CartaBundle\Entity\Tipoprecio $tipoprecios)
    {
        $this->tipoprecios = $tipoprecios;
    }

    public function getTipo_precio()
    {
        return $this->tipoprecios;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Plato")
     * @ORM\JoinColumn(name="platoid", referencedColumnName="id")
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

}


