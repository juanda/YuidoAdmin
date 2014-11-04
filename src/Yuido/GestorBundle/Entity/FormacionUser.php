<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormacionUser
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\FormacionUserRepository")
 */
class FormacionUser
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
     ** @ORM\Column(name="tipoColaboracion", type="simple_array", nullable=true, columnDefinition="SET('ELABORACION','MAQUETACION','IMPARTICION','COMERCIALIZACION')")
     */
    private $tipoColaboracion;

    
    ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\ManyToOne(targetEntity="Formacion", inversedBy="FormacionUsuarios")
     */
    protected $formacion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Jazzyweb\UserBundle\Entity\User", inversedBy="FormacionUsuarios")
     */
    protected $usuario;
    
     ////////////////////////////////////////
    
    
    public function __toString()
    {
        //Error en Sonata si devuelve null, por eso tiene que devolver una cadena.
        return '';
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
     * Set tipoColaboracion
     *
     * @param string $tipoColaboracion
     * @return FormacionUser
     */
    public function setTipoColaboracion($tipoColaboracion)
    {
        $this->tipoColaboracion = $tipoColaboracion;
    
        return $this;
    }

    /**
     * Get tipoColaboracion
     *
     * @return string 
     */
    public function getTipoColaboracion()
    {
        return $this->tipoColaboracion;
    }

    /**
     * Set formacion
     *
     * @param \Yuido\GestorBundle\Entity\Formacion $formacion
     * @return FormacionUser
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
     * Set usuario
     *
     * @param \Jazzyweb\UserBundle\Entity\User $usuario
     * @return FormacionUser
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add usuarios
     *
     * @param \Jazzyweb\UserBundle\Entity\User $usuarios
     * @return FormacionUser
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
     * Add formaciones
     *
     * @param \Yuido\GestorBundle\Entity\Formacion $formaciones
     * @return FormacionUser
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