<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MasterClass
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\MasterClassRepository")
 */
class MasterClass
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaDesde", type="datetime")
     */
    private $fechaDesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaHasta", type="datetime")
     */
    private $fechaHasta;

    /**
     * @var string
     *
     * @ORM\Column(name="Observaciones", type="text", nullable=true)
     */
    private $observaciones;
    

   ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\ManyToOne(targetEntity="Formacion", inversedBy="masterClasses")
     */
    protected $formacion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Aula", inversedBy="masterClasses")
     */
    protected $aula;
    
  ////////////////////////////////////////
    
    
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
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return MasterClass
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;
    
        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime 
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     * @return MasterClass
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;
    
        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime 
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return MasterClass
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set formacion
     *
     * @param \Yuido\GestorBundle\Entity\Formacion $formacion
     * @return MasterClass
     */
    public function setFormacion(\Yuido\GestorBundle\Entity\Formacion $formacion = null)
    {
        $this->formacion = $formacion;
    
        return $this;
    }

    /**
     * Get formacion
     *
     * @return \Yuido\GestorBundle\Entity\Formacion 
     */
    public function getFormacion()
    {
        return $this->formacion;
    }

    /**
     * Set aula
     *
     * @param \Yuido\GestorBundle\Entity\Aula $aula
     * @return MasterClass
     */
    public function setAula(\Yuido\GestorBundle\Entity\Aula $aula = null)
    {
        $this->aula = $aula;
    
        return $this;
    }

    /**
     * Get aula
     *
     * @return \Yuido\GestorBundle\Entity\Aula 
     */
    public function getAula()
    {
        return $this->aula;
    }
}
