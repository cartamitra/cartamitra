<?php

namespace Carta\CartaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoPrecio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Carta\CartaBundle\Entity\TipoPrecioRepository")
 */
class TipoPrecio
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
     * @var float
     *
     * @ORM\Column(name="porcentaje", type="float")
     */
    private $porcentaje;

    /**
     * @var integer
     *
     * @ORM\Column(name="clienteid", type="integer")
     */
    private $clienteid;


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
     * Set porcentaje
     *
     * @param float $porcentaje
     * @return TipoPrecio
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;
    
        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return float 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set clienteid
     *
     * @param integer $clienteid
     * @return TipoPrecio
     */
    public function setClienteid($clienteid)
    {
        $this->clienteid = $clienteid;
    
        return $this;
    }

    /**
     * Get clienteid
     *
     * @return integer 
     */
    public function getClienteid()
    {
        return $this->clienteid;
    }
    /**
     * @ORM\OneToOne(targetEntity="Cliente")
     * @ORM\JoinColumn(name="clienteid", referencedColumnName="id")
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


