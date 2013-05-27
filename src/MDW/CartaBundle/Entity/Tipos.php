<?php

namespace MDW\CartaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MDW\CartaBundle\Entity\TiposRepository")
 */
class Tipos
{

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     * @ORM\Id
     */
    private $tipo;


    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Tipos
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @ORM\OneToMany(targetEntity="Platos", mappedBy="tipo")
     */
    private $plato;
    public function __construct()
    {
        $this->plato = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function addplato(\Mdw\CartaBundle\Entity\Platos $plato)
    {
        $this->plato[] = $plato;
    }

    public function getplato()
    {
        return $this->plato;
    }
    
}
