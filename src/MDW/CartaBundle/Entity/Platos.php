<?php

namespace MDW\CartaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Platos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MDW\CartaBundle\Entity\PlatosRepository")
 */
class Platos
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     * 
     *     
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="foto_id", type="string", length=255)
     */
    private $fotoId;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Platos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Platos
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
     * Set tipo
     *
     * @param string $tipo
     * @return Platos
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
     * Set fotoId
     *
     * @param string $fotoId
     * @return Platos
     */
    public function setFotoId($fotoId)
    {
        $this->fotoId = $fotoId;
    
        return $this;
    }

    /**
     * Get fotoId
     *
     * @return string 
     */
    public function getFotoId()
    {
        return $this->fotoId;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Tipos", inversedBy="platos")
     * @ORM\JoinColumn(name="tipo", referencedColumnName="tipo")
     * @return string
     */
    private $tipos;
    public function setTipos(\Mdw\CartaBundle\Entity\Tipos $tipos)
    {
        $this->tipos = $tipos;
    }

    public function gettipos()
    {
        return $this->tipos;
    }

    /**
     * @ORM\OneToMany(targetEntity="Comandas", mappedBy="plato")
     */
    private $comanda;
    public function __construct()
    {
        $this->comanda = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function addcomanda(\Mdw\CartaBundle\Entity\Comandas $comanda)
    {
        $this->comanda[] = $comanda;
    }

    public function getcomanda()
    {
        return $this->comanda;
    }
}
