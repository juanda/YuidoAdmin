<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * YuidoEmpresa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\YuidoEmpresaRepository")
 */
class YuidoEmpresa
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
     * @ORM\Column(name="cif", type="string", length=255)
     */
    private $cif;

    /**
     * @var string
     *
     * @ORM\Column(name="razonSocial", type="string", length=255)
     */
    private $razonSocial;

    /**
     * @var integer
     *
     * @ORM\Column(name="capitalSocial", type="integer")
     */
    private $capitalSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoSociedad", type="string", length=255)
     */
    private $tipoSociedad;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="notaria", type="string", length=255)
     */
    private $notaria;

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
     * Set cif
     *
     * @param string $cif
     * @return YuidoEmpresa
     */
    public function setCif($cif)
    {
        $this->cif = $cif;
    
        return $this;
    }

    /**
     * Get cif
     *
     * @return string 
     */
    public function getCif()
    {
        return $this->cif;
    }

    /**
     * Set razonSocial
     *
     * @param string $razonSocial
     * @return YuidoEmpresa
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
    
        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string 
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set capitalSocial
     *
     * @param integer $capitalSocial
     * @return YuidoEmpresa
     */
    public function setCapitalSocial($capitalSocial)
    {
        $this->capitalSocial = $capitalSocial;
    
        return $this;
    }

    /**
     * Get capitalSocial
     *
     * @return integer 
     */
    public function getCapitalSocial()
    {
        return $this->capitalSocial;
    }

    /**
     * Set tipoSociedad
     *
     * @param string $tipoSociedad
     * @return YuidoEmpresa
     */
    public function setTipoSociedad($tipoSociedad)
    {
        $this->tipoSociedad = $tipoSociedad;
    
        return $this;
    }

    /**
     * Get tipoSociedad
     *
     * @return string 
     */
    public function getTipoSociedad()
    {
        return $this->tipoSociedad;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return YuidoEmpresa
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set notaria
     *
     * @param string $notaria
     * @return YuidoEmpresa
     */
    public function setNotaria($notaria)
    {
        $this->notaria = $notaria;
    
        return $this;
    }

    /**
     * Get notaria
     *
     * @return string 
     */
    public function getNotaria()
    {
        return $this->notaria;
    }
}
