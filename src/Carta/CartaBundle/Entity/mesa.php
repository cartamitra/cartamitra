<?php

namespace Carta\CartaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * mesa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Carta\CartaBundle\Entity\mesaRepository")
 */
class mesa
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
     * @ORM\Column(name="mesa", type="integer", length=2)
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
     * Set mesa
     *
     * @param integer $mesa
     * @return mesa
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
    
    public function __toString() {
        return strval($this->mesa);
    }
}
