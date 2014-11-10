<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sprint
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\SprintRepository")
 */
class Sprint
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicioSprint", type="date")
     */
    private $fechaInicioSprint;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFinSprint", type="date")
     */
    private $fechaFinSprint;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", nullable=true, columnDefinition="ENUM('EN_PROCESO','SI','NO')")
     */
    private $exito;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;


    ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\ManyToOne(targetEntity="Proyecto", inversedBy="sprints")
     */
    protected $proyecto;
    
   /**
     * @ORM\OneToMany(targetEntity="HistoriaUsuario", mappedBy="sprint")
     */
    protected $historiasUsuario;
    ////////////////////////////////////////
    
    
    public function __toString()
    {
        //Error en Sonata si devuelve null, por eso tiene que devolver una cadena.

        $nombreProyecto = ($this->getProyecto())? $this->getProyecto()->getNombre() : '';
        return $this->getNombre().' - '.$nombreProyecto;
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
     * Set fechaInicioSprint
     *
     * @param \DateTime $fechaInicioSprint
     * @return Sprint
     */
    public function setFechaInicioSprint($fechaInicioSprint)
    {
        $this->fechaInicioSprint = $fechaInicioSprint;
    
        return $this;
    }

    /**
     * Get fechaInicioSprint
     *
     * @return \DateTime 
     */
    public function getFechaInicioSprint()
    {
        return $this->fechaInicioSprint;
    }

    /**
     * Set fechaFinSprint
     *
     * @param \DateTime $fechaFinSprint
     * @return Sprint
     */
    public function setFechaFinSprint($fechaFinSprint)
    {
        $this->fechaFinSprint = $fechaFinSprint;
    
        return $this;
    }

    /**
     * Get fechaFinSprint
     *
     * @return \DateTime 
     */
    public function getFechaFinSprint()
    {
        return $this->fechaFinSprint;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Sprint
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
     * Set exito
     *
     * @param string $exito
     * @return Sprint
     */
    public function setExito($exito)
    {
        $this->exito = $exito;
    
        return $this;
    }

    /**
     * Get exito
     *
     * @return string 
     */
    public function getExito()
    {
        return $this->exito;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Sprint
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
     * Constructor
     */
    public function __construct()
    {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
        $this->proveedores = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set proyecto
     *
     * @param \Yuido\GestorBundle\Entity\Proyecto $proyecto
     * @return Sprint
     */
    public function setProyecto(\Yuido\GestorBundle\Entity\Proyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;
    
        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \Yuido\GestorBundle\Entity\Proyecto 
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }

    /**
     * Add usuarios
     *
     * @param \Jazzyweb\UserBundle\Entity\User $usuarios
     * @return Sprint
     */
    public function addUsuario(\Jazzyweb\UserBundle\Entity\User $usuarios)
    {
        $this->usuarios[] = $usuarios;
    
        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \Jazzyweb\UserBundle\Entity\User $usuarios
     */
    public function removeUsuario(\Jazzyweb\UserBundle\Entity\User $usuarios)
    {
        $this->usuarios->removeElement($usuarios);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * Add proveedores
     *
     * @param \Yuido\GestorBundle\Entity\Proveedor $proveedores
     * @return Sprint
     */
    public function addProveedore(\Yuido\GestorBundle\Entity\Proveedor $proveedores)
    {
        $this->proveedores[] = $proveedores;
    
        return $this;
    }

    /**
     * Remove proveedores
     *
     * @param \Yuido\GestorBundle\Entity\Proveedor $proveedores
     */
    public function removeProveedore(\Yuido\GestorBundle\Entity\Proveedor $proveedores)
    {
        $this->proveedores->removeElement($proveedores);
    }

    /**
     * Get proveedores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProveedores()
    {
        return $this->proveedores;
    }

    /**
     * Add historiasUsuario
     *
     * @param \Yuido\GestorBundle\Entity\HistoriaUsuario $historiasUsuario
     * @return Sprint
     */
    public function addHistoriasUsuario(\Yuido\GestorBundle\Entity\HistoriaUsuario $historiasUsuario)
    {
        $this->historiasUsuario[] = $historiasUsuario;
    
        return $this;
    }

    /**
     * Remove historiasUsuario
     *
     * @param \Yuido\GestorBundle\Entity\HistoriaUsuario $historiasUsuario
     */
    public function removeHistoriasUsuario(\Yuido\GestorBundle\Entity\HistoriaUsuario $historiasUsuario)
    {
        $this->historiasUsuario->removeElement($historiasUsuario);
    }

    /**
     * Get historiasUsuario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHistoriasUsuario()
    {
        return $this->historiasUsuario;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Sprint
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
}
