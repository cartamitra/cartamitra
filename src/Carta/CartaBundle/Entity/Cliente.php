<?php

namespace Carta\CartaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Carta\CartaBundle\Entity\ClienteRepository")
 */
class Cliente
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
     * @var string
     *
     * @ORM\Column(name="tipo_cliente", type="string", length=50)
     *
     */
    private $tipoCliente;


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
     * Set tipoCliente
     *
     * @param string $tipoCliente
     * @return Cliente
     */
    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;
    
        return $this;
    }

    /**
     * Get tipoCliente
     *
     * @return string 
     */
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }
}