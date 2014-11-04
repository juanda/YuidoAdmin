<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\ClienteRepository")
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

    
   ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\OneToMany(targetEntity="Proyecto", mappedBy="cliente")
     */
    protected $proyectos;
    
    /**
     * @ORM\OneToMany(targetEntity="Visita", mappedBy="cliente")
     */
    protected $visitas;
    
    /**
     * @ORM\ManyToMany(targetEntity="Formacion", mappedBy="clientes", cascade={"persist"})
     */
    protected $formaciones;
    
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Cliente
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
     * @return Cliente
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
     * Set email
     *
     * @param string $email
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * Constructor
     */
    public function __construct()
    {
        $this->proyectos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->visitas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add proyectos
     *
     * @param \Yuido\GestorBundle\Entity\Proyecto $proyectos
     * @return Cliente
     */
    public function addProyecto(\Yuido\GestorBundle\Entity\Proyecto $proyectos)
    {
        $this->proyectos[] = $proyectos;
    
        return $this;
    }

    /**
     * Remove proyectos
     *
     * @param \Yuido\GestorBundle\Entity\Proyecto $proyectos
     */
    public function removeProyecto(\Yuido\GestorBundle\Entity\Proyecto $proyectos)
    {
        $this->proyectos->removeElement($proyectos);
    }

    /**
     * Get proyectos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProyectos()
    {
        return $this->proyectos;
    }

    /**
     * Add visitas
     *
     * @param \Yuido\GestorBundle\Entity\Visita $visitas
     * @return Cliente
     */
    public function addVisita(\Yuido\GestorBundle\Entity\Visita $visitas)
    {
        $this->visitas[] = $visitas;
    
        return $this;
    }

    /**
     * Remove visitas
     *
     * @param \Yuido\GestorBundle\Entity\Visita $visitas
     */
    public function removeVisita(\Yuido\GestorBundle\Entity\Visita $visitas)
    {
        $this->visitas->removeElement($visitas);
    }

    /**
     * Get visitas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisitas()
    {
        return $this->visitas;
    }

    /**
     * Add formaciones
     *
     * @param \Yuido\GestorBundle\Entity\Formacion $formaciones
     * @return Cliente
     */
    public function addFormacione(\Yuido\GestorBundle\Entity\Formacion $formaciones)
    {
        $this->formaciones[] = $formaciones;
    
        return $this;
    }

    /**
     * Remove formaciones
     *
     * @param \Yuido\GestorBundle\Entity\Formacion $formaciones
     */
    public function removeFormacione(\Yuido\GestorBundle\Entity\Formacion $formaciones)
    {
        $this->formaciones->removeElement($formaciones);
    }

    /**
     * Get formaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormaciones()
    {
        return $this->formaciones;
    }
}