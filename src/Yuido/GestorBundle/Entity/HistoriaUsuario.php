<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriaUsuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\HistoriaUsuarioRepository")
 */
class HistoriaUsuario
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
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntos", type="integer")
     */
    private $puntos;

    /**
     * @var string
     *
     * @ORM\Column(name="riesgo", type="string", columnDefinition="ENUM('BAJO','MEDIO','ALTO')")
     */
    private $riesgo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hecho", nullable=true, type="boolean")
     */
    private $hecho;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", nullable=true, type="text")
     */
    private $observaciones;
    
    
    /////////// RELACIONES /////////////
    
    /**
     * @ORM\ManyToMany(targetEntity="Jazzyweb\UserBundle\Entity\User", inversedBy="historiasUsuario")
     */
    protected $usuarios;
    
        
    /**
     * @ORM\ManyToMany(targetEntity="Proveedor", inversedBy="historiasUsuario")
     */
    protected $proveedores;
    
    /**
     * @ORM\ManyToOne(targetEntity="Sprint", inversedBy="historiasUsuario")
     */
    protected $sprint;
    
    ////////////////////////////////////


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
     * @return HistoriaUsuario
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
     * Set puntos
     *
     * @param integer $puntos
     * @return HistoriaUsuario
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;
    
        return $this;
    }

    /**
     * Get puntos
     *
     * @return integer 
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set riesgo
     *
     * @param string $riesgo
     * @return HistoriaUsuario
     */
    public function setRiesgo($riesgo)
    {
        $this->riesgo = $riesgo;
    
        return $this;
    }

    /**
     * Get riesgo
     *
     * @return string 
     */
    public function getRiesgo()
    {
        return $this->riesgo;
    }

    /**
     * Set hecho
     *
     * @param string $hecho
     * @return HistoriaUsuario
     */
    public function setHecho($hecho)
    {
        $this->hecho = $hecho;
    
        return $this;
    }

    /**
     * Get hecho
     *
     * @return string 
     */
    public function getHecho()
    {
        return $this->hecho;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return HistoriaUsuario
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
     * Add usuarios
     *
     * @param \Jazzyweb\UserBundle\Entity\User $usuarios
     * @return HistoriaUsuario
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
     * @return HistoriaUsuario
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
     * Set sprint
     *
     * @param \Yuido\GestorBundle\Entity\Sprint $sprint
     * @return HistoriaUsuario
     */
    public function setSprint(\Yuido\GestorBundle\Entity\Sprint $sprint = null)
    {
        $this->sprint = $sprint;
    
        return $this;
    }

    /**
     * Get sprint
     *
     * @return \Yuido\GestorBundle\Entity\Sprint 
     */
    public function getSprint()
    {
        return $this->sprint;
    }
}