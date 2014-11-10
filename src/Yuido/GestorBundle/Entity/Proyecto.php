<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\ProyectoRepository")
 */
class Proyecto
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
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="codigoPresu", type="string", nullable=true, length=255)
     */
    private $codigoPresu;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaEmisionPresu",nullable=true, type="date")
     */
    private $fechaEmisionPresu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaIniPresu", nullable=true, type="date")
     */
    private $fechaIniPresu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaFinPresu", nullable=true, type="date")
     */
    private $fechaFinPresu;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin",nullable=true, type="date")
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", nullable=true, columnDefinition="ENUM('PENDIENTE','ACEPTADO','EN_EJECUCION','RECHAZADO','REALIZADO','ANULADO_EN_EJECUCION')")
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="importe", nullable=true, type="integer")
     */
    private $importe;
    
    
     ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\ManyToMany(targetEntity="ServicioServidor", inversedBy="proyectos")
     */
    protected $serviciosServidor;
       
    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="proyectos")
     */
    protected $cliente;
    
    /**
     * @ORM\OneToMany(targetEntity="Documentacion", mappedBy="proyecto")
     */
    protected $documentaciones;
    
    /**
     * @ORM\OneToMany(targetEntity="Sprint", mappedBy="proyecto")
     */
    protected $sprints;
    
    ////////////////////////////////////////


    public function __toString()
    {
        //Error en Sonata si devuelve null, por eso tiene que devolver una cadena.
        return $this->getNombre() ?: '';
    }
    
    
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Proyecto
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
     * Set codigoPresu
     *
     * @param string $codigoPresu
     * @return Proyecto
     */
    public function setCodigoPresu($codigoPresu)
    {
        $this->codigoPresu = $codigoPresu;
    
        return $this;
    }

    /**
     * Get codigoPresu
     *
     * @return string 
     */
    public function getCodigoPresu()
    {
        return $this->codigoPresu;
    }

    /**
     * Set fechaIniPresu
     *
     * @param \DateTime $fechaIniPresu
     * @return Proyecto
     */
    public function setFechaIniPresu($fechaIniPresu)
    {
        $this->fechaIniPresu = $fechaIniPresu;
    
        return $this;
    }

    /**
     * Get fechaIniPresu
     *
     * @return \DateTime 
     */
    public function getFechaIniPresu()
    {
        return $this->fechaIniPresu;
    }

    /**
     * Set fechaFinPresu
     *
     * @param \DateTime $fechaFinPresu
     * @return Proyecto
     */
    public function setFechaFinPresu($fechaFinPresu)
    {
        $this->fechaFinPresu = $fechaFinPresu;
    
        return $this;
    }

    /**
     * Get fechaFinPresu
     *
     * @return \DateTime 
     */
    public function getFechaFinPresu()
    {
        return $this->fechaFinPresu;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Proyecto
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Proyecto
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Proyecto
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set importe
     *
     * @param integer $importe
     * @return Proyecto
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;
    
        return $this;
    }

    /**
     * Get importe
     *
     * @return integer 
     */
    public function getImporte()
    {
        return $this->importe;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->documentaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sprints = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set servidor
     *
     * @param \Yuido\GestorBundle\Entity\Servidor $servidor
     * @return Proyecto
     */
    public function setServidor(\Yuido\GestorBundle\Entity\Servidor $servidor = null)
    {
        $this->servidor = $servidor;
    
        return $this;
    }

    /**
     * Get servidor
     *
     * @return \Yuido\GestorBundle\Entity\Servidor 
     */
    public function getServidor()
    {
        return $this->servidor;
    }

    /**
     * Set cliente
     *
     * @param \Yuido\GestorBundle\Entity\Cliente $cliente
     * @return Proyecto
     */
    public function setCliente(\Yuido\GestorBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;
    
        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Yuido\GestorBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Add documentaciones
     *
     * @param \Yuido\GestorBundle\Entity\Documentacion $documentaciones
     * @return Proyecto
     */
    public function addDocumentacione(\Yuido\GestorBundle\Entity\Documentacion $documentaciones)
    {
        $this->documentaciones[] = $documentaciones;
    
        return $this;
    }

    /**
     * Remove documentaciones
     *
     * @param \Yuido\GestorBundle\Entity\Documentacion $documentaciones
     */
    public function removeDocumentacione(\Yuido\GestorBundle\Entity\Documentacion $documentaciones)
    {
        $this->documentaciones->removeElement($documentaciones);
    }

    /**
     * Get documentaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocumentaciones()
    {
        return $this->documentaciones;
    }

    /**
     * Add sprints
     *
     * @param \Yuido\GestorBundle\Entity\Sprint $sprints
     * @return Proyecto
     */
    public function addSprint(\Yuido\GestorBundle\Entity\Sprint $sprints)
    {
        $this->sprints[] = $sprints;
    
        return $this;
    }

    /**
     * Remove sprints
     *
     * @param \Yuido\GestorBundle\Entity\Sprint $sprints
     */
    public function removeSprint(\Yuido\GestorBundle\Entity\Sprint $sprints)
    {
        $this->sprints->removeElement($sprints);
    }

    /**
     * Get sprints
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSprints()
    {
        return $this->sprints;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Proyecto
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
     * Set fechaEmisionPresu
     *
     * @param \DateTime $fechaEmisionPresu
     * @return Proyecto
     */
    public function setFechaEmisionPresu($fechaEmisionPresu)
    {
        $this->fechaEmisionPresu = $fechaEmisionPresu;
    
        return $this;
    }

    /**
     * Get fechaEmisionPresu
     *
     * @return \DateTime 
     */
    public function getFechaEmisionPresu()
    {
        return $this->fechaEmisionPresu;
    }

    /**
     * Add serviciosServidor
     *
     * @param \Yuido\GestorBundle\Entity\ServicioServidor $serviciosServidor
     * @return Proyecto
     */
    public function addServiciosServidor(\Yuido\GestorBundle\Entity\ServicioServidor $serviciosServidor)
    {
        $this->serviciosServidor[] = $serviciosServidor;
    
        return $this;
    }

    /**
     * Remove serviciosServidor
     *
     * @param \Yuido\GestorBundle\Entity\ServicioServidor $serviciosServidor
     */
    public function removeServiciosServidor(\Yuido\GestorBundle\Entity\ServicioServidor $serviciosServidor)
    {
        $this->serviciosServidor->removeElement($serviciosServidor);
    }

    /**
     * Get serviciosServidor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServiciosServidor()
    {
        return $this->serviciosServidor;
    }
}
