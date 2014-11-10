<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientePotencial
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\ClientePotencialRepository")
 */
class ClientePotencial
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
     * @ORM\Column(name="contacto", type="string", length=255)
     */
    private $contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="contactado", type="string", length=255)
     */
    private $contactado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visitado", type="boolean")
     */
    private $visitado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaVisita", type="date")
     */
    private $fechaVisita;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono2", type="string", length=255)
     */
    private $telefono2;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="url_web", type="string", length=255)
     */
    private $urlWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad", type="string", length=255)
     */
    private $actividad;

    /**
     * @var string
     *
     * @ORM\Column(name="horario", type="string", length=255)
     */
    private $horario;


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
     * @return ClientePotencial
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
     * Set contacto
     *
     * @param string $contacto
     * @return ClientePotencial
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
    
        return $this;
    }

    /**
     * Get contacto
     *
     * @return string 
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set contactado
     *
     * @param string $contactado
     * @return ClientePotencial
     */
    public function setContactado($contactado)
    {
        $this->contactado = $contactado;
    
        return $this;
    }

    /**
     * Get contactado
     *
     * @return string 
     */
    public function getContactado()
    {
        return $this->contactado;
    }

    /**
     * Set visitado
     *
     * @param boolean $visitado
     * @return ClientePotencial
     */
    public function setVisitado($visitado)
    {
        $this->visitado = $visitado;
    
        return $this;
    }

    /**
     * Get visitado
     *
     * @return boolean 
     */
    public function getVisitado()
    {
        return $this->visitado;
    }

    /**
     * Set fechaVisita
     *
     * @param \DateTime $fechaVisita
     * @return ClientePotencial
     */
    public function setFechaVisita($fechaVisita)
    {
        $this->fechaVisita = $fechaVisita;
    
        return $this;
    }

    /**
     * Get fechaVisita
     *
     * @return \DateTime 
     */
    public function getFechaVisita()
    {
        return $this->fechaVisita;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ClientePotencial
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return ClientePotencial
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set telefono2
     *
     * @param string $telefono2
     * @return ClientePotencial
     */
    public function setTelefono2($telefono2)
    {
        $this->telefono2 = $telefono2;
    
        return $this;
    }

    /**
     * Get telefono2
     *
     * @return string 
     */
    public function getTelefono2()
    {
        return $this->telefono2;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return ClientePotencial
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set urlWeb
     *
     * @param string $urlWeb
     * @return ClientePotencial
     */
    public function setUrlWeb($urlWeb)
    {
        $this->urlWeb = $urlWeb;
    
        return $this;
    }

    /**
     * Get urlWeb
     *
     * @return string 
     */
    public function getUrlWeb()
    {
        return $this->urlWeb;
    }

    /**
     * Set actividad
     *
     * @param string $actividad
     * @return ClientePotencial
     */
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;
    
        return $this;
    }

    /**
     * Get actividad
     *
     * @return string 
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set horario
     *
     * @param string $horario
     * @return ClientePotencial
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    
        return $this;
    }

    /**
     * Get horario
     *
     * @return string 
     */
    public function getHorario()
    {
        return $this->horario;
    }
}
