<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aula
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\AulaRepository")
 */
class Aula
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
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="aforo", type="string", length=255)
     */
    private $aforo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="contacto", type="string", length=255)
     */
    private $contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;


    ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\ManyToMany(targetEntity="Formacion", mappedBy="aulas", cascade={"persist"})
     */
    protected $formaciones;
    
    /**
     * @ORM\OneToMany(targetEntity="MasterClass", mappedBy="aulas")
     */
    protected $masterClasses;
    
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
     * Set direccion
     *
     * @param string $direccion
     * @return Aula
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
     * Set aforo
     *
     * @param string $aforo
     * @return Aula
     */
    public function setAforo($aforo)
    {
        $this->aforo = $aforo;
    
        return $this;
    }

    /**
     * Get aforo
     *
     * @return string 
     */
    public function getAforo()
    {
        return $this->aforo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Aula
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
     * Set contacto
     *
     * @param string $contacto
     * @return Aula
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
     * Set telefono
     *
     * @param string $telefono
     * @return Aula
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
     * Constructor
     */
    public function __construct()
    {
        $this->formaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add formaciones
     *
     * @param \Yuido\GestorBundle\Entity\Formacion $formaciones
     * @return Aula
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

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Aula
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
     * Add masterClasses
     *
     * @param \Yuido\GestorBundle\Entity\MasterClass $masterClasses
     * @return Aula
     */
    public function addMasterClasse(\Yuido\GestorBundle\Entity\MasterClass $masterClasses)
    {
        $this->masterClasses[] = $masterClasses;
    
        return $this;
    }

    /**
     * Remove masterClasses
     *
     * @param \Yuido\GestorBundle\Entity\MasterClass $masterClasses
     */
    public function removeMasterClasse(\Yuido\GestorBundle\Entity\MasterClass $masterClasses)
    {
        $this->masterClasses->removeElement($masterClasses);
    }

    /**
     * Get masterClasses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMasterClasses()
    {
        return $this->masterClasses;
    }
}