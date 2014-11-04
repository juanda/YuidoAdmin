<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visita
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\VisitaRepository")
 */
class Visita
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
     * @ORM\Column(name="fechaHora", type="datetime")
     */
    private $fechaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=255)
     */
    private $motivo;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    
    
    ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="visitas")
     */
    protected $cliente;
    
     /**
     * @ORM\ManyToOne(targetEntity="Jazzyweb\UserBundle\Entity\User", inversedBy="visitas")
     */
    protected $usuario;
    
    
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
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return Visita
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;
    
        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return \DateTime 
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     * @return Visita
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    
        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Visita
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
     * Set cliente
     *
     * @param \Yuido\GestorBundle\Entity\Cliente $cliente
     * @return Visita
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
     * Set usuario
     *
     * @param \Jazzyweb\UserBundle\Entity\User $usuario
     * @return Visita
     */
    public function setUsuario(\Jazzyweb\UserBundle\Entity\User $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Jazzyweb\UserBundle\Entity\User 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}