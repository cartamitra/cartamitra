<?php

namespace Carta\CartaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Plato
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Carta\CartaBundle\Entity\PlatoRepository")
 */
class Plato
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
     * @ORM\Column(name="Nombre", type="string", length=150)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="foto_id", type="integer")
     */
    private $fotoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_id", type="integer")
     */
    private $tipoId;


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
     * @return Plato
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
     * Set fotoId
     *
     * @param integer $fotoId
     * @return Plato
     */
    public function setFotoId($fotoId)
    {
        $this->fotoId = $fotoId;
    
        return $this;
    }

    /**
     * Get fotoId
     *
     * @return integer 
     */
    public function getFotoId()
    {
        return $this->fotoId;
    }

    /**
     * Set tipoId
     *
     * @param integer $tipoId
     * @return Plato
     */
    public function setTipoId($tipoId)
    {
        $this->tipoId = $tipoId;
    
        return $this;
    }

    /**
     * Get tipoId
     *
     * @return integer 
     */
    public function getTipoId()
    {
        return $this->tipoId;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Tipo", inversedBy="plato")
     * @ORM\JoinColumn(name="tipo_id", referencedColumnName="id")
     */
    private $tipo;
    public function setTipo(\Carta\CartaBundle\Entity\Tipo $tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @ORM\OneToOne(targetEntity="Foto")
     * @ORM\JoinColumn(name="foto_id", referencedColumnName="id")
     **/
    private $foto;
    public function setFoto(\Carta\CartaBundle\Entity\Foto $foto)
    {
        $this->foto = $foto;
    }

    public function getFoto()
    {
        return $this->foto;
    }
}