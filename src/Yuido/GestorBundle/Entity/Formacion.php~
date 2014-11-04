<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\FormacionRepository")
 */
class Formacion
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
     * @ORM\Column(name="curso", type="string", length=255)
     */
    private $curso;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicioCurso", type="datetime", nullable=true)
     */
    private $fechaInicioCurso;  
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFinCurso", type="datetime", nullable=true)
     */
    private $fechaFinCurso;
    

    /**
     * @var string
     *
     * @ORM\Column(name="horas", type="string", length=255, nullable=true)
     */
    private $horas;

    /**
     * @var integer
     *
     * @ORM\Column(name="importe", type="integer", nullable=true)
     */
    private $importe;
    
    /**
     * @var string
     *
     * @ORM\Column(name="modalidadImporte", type="string", nullable=true, columnDefinition="ENUM('PENDIENTE','PERSONA_INVIDIDUAL','GLOBAL')")
     */
    private $modalidadImporte;

    /**
     * @var string
     *
     * @ORM\Column(name="modalidadCurso", type="string", nullable=true, columnDefinition="ENUM('PENDIENTE','ONLINE','PRESENCIAL')")
     */
    private $modalidadCurso;

    
    
    ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\ManyToMany(targetEntity="Aula", inversedBy="formaciones", cascade={"persist"})
     */
    protected $aulas;
        
    /**
     * @ORM\ManyToMany(targetEntity="Cliente", inversedBy="formaciones", cascade={"persist"})
     */
    protected $clientes;
        
    /**
     * @ORM\OneToMany(targetEntity="MasterClass", mappedBy="formacion")
     */
    protected $masterClasses;
       
    /**
     * @ORM\OneToMany(targetEntity="FormacionUser", mappedBy="formacion")
     */
    protected $formacionUsuarios;
    
    /**
     * @ORM\OneToMany(targetEntity="FormacionProveedor", mappedBy="formacion")
     */
    protected $formacionProveedores;
    
    ////////////////////////////////////////
    
    

    public function __toString()
    {
        //Error en Sonata si devuelve null, por eso tiene que devolver una cadena.
        return $this->getCurso() ?: '';
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
     * Set curso
     *
     * @param string $curso
     * @return Formacion
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;
    
        return $this;
    }

    /**
     * Get curso
     *
     * @return string 
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Formacion
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
     * Set importe
     *
     * @param integer $importe
     * @return Formacion
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
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clientes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set aula
     *
     * @param \Yuido\GestorBundle\Entity\Aula $aula
     * @return Formacion
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

    /**
     * Add usuarios
     *
     * @param \Jazzyweb\UserBundle\Entity\User $usuarios
     * @return Formacion
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
     * Add clientes
     *
     * @param \Yuido\GestorBundle\Entity\Cliente $clientes
     * @return Formacion
     */
    public function addCliente(\Yuido\GestorBundle\Entity\Cliente $clientes)
    {
        $this->clientes[] = $clientes;
    
        return $this;
    }

    /**
     * Remove clientes
     *
     * @param \Yuido\GestorBundle\Entity\Cliente $clientes
     */
    public function removeCliente(\Yuido\GestorBundle\Entity\Cliente $clientes)
    {
        $this->clientes->removeElement($clientes);
    }

    /**
     * Get clientes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * Set fechaInicioCurso
     *
     * @param \DateTime $fechaInicioCurso
     * @return Formacion
     */
    public function setFechaInicioCurso($fechaInicioCurso)
    {
        $this->fechaInicioCurso = $fechaInicioCurso;
    
        return $this;
    }

    /**
     * Get fechaInicioCurso
     *
     * @return \DateTime 
     */
    public function getFechaInicioCurso()
    {
        return $this->fechaInicioCurso;
    }

    /**
     * Set fechaFinCurso
     *
     * @param \DateTime $fechaFinCurso
     * @return Formacion
     */
    public function setFechaFinCurso($fechaFinCurso)
    {
        $this->fechaFinCurso = $fechaFinCurso;
    
        return $this;
    }

    /**
     * Get fechaFinCurso
     *
     * @return \DateTime 
     */
    public function getFechaFinCurso()
    {
        return $this->fechaFinCurso;
    }

    /**
     * Set horas
     *
     * @param string $horas
     * @return Formacion
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;
    
        return $this;
    }

    /**
     * Get horas
     *
     * @return string 
     */
    public function getHoras()
    {
        return $this->horas;
    }

    /**
     * Set modalidadImporte
     *
     * @param string $modalidadImporte
     * @return Formacion
     */
    public function setModalidadImporte($modalidadImporte)
    {
        $this->modalidadImporte = $modalidadImporte;
    
        return $this;
    }

    /**
     * Get modalidadImporte
     *
     * @return string 
     */
    public function getModalidadImporte()
    {
        return $this->modalidadImporte;
    }

    /**
     * Add aulas
     *
     * @param \Yuido\GestorBundle\Entity\Aula $aulas
     * @return Formacion
     */
    public function addAula(\Yuido\GestorBundle\Entity\Aula $aulas)
    {
        $this->aulas[] = $aulas;
    
        return $this;
    }

    /**
     * Remove aulas
     *
     * @param \Yuido\GestorBundle\Entity\Aula $aulas
     */
    public function removeAula(\Yuido\GestorBundle\Entity\Aula $aulas)
    {
        $this->aulas->removeElement($aulas);
    }

    /**
     * Get aulas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAulas()
    {
        return $this->aulas;
    }

    /**
     * Add masterClasses
     *
     * @param \Yuido\GestorBundle\Entity\MasterClass $masterClasses
     * @return Formacion
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

    /**
     * Set modalidadCurso
     *
     * @param string $modalidadCurso
     * @return Formacion
     */
    public function setModalidadCurso($modalidadCurso)
    {
        $this->modalidadCurso = $modalidadCurso;
    
        return $this;
    }

    /**
     * Get modalidadCurso
     *
     * @return string 
     */
    public function getModalidadCurso()
    {
        return $this->modalidadCurso;
    }

    /**
     * Add formacionUsuarios
     *
     * @param \Yuido\GestorBundle\Entity\FormacionUser $formacionUsuarios
     * @return Formacion
     */
    public function addFormacionUsuario(\Yuido\GestorBundle\Entity\FormacionUser $formacionUsuarios)
    {
        $this->formacionUsuarios[] = $formacionUsuarios;
    
        return $this;
    }

    /**
     * Remove formacionUsuarios
     *
     * @param \Yuido\GestorBundle\Entity\FormacionUser $formacionUsuarios
     */
    public function removeFormacionUsuario(\Yuido\GestorBundle\Entity\FormacionUser $formacionUsuarios)
    {
        $this->formacionUsuarios->removeElement($formacionUsuarios);
    }

    /**
     * Get formacionUsuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormacionUsuarios()
    {
        return $this->formacionUsuarios;
    }

    /**
     * Add formacionProveedores
     *
     * @param \Yuido\GestorBundle\Entity\FormacionProveedor $formacionProveedores
     * @return Formacion
     */
    public function addFormacionProveedore(\Yuido\GestorBundle\Entity\FormacionProveedor $formacionProveedores)
    {
        $this->formacionProveedores[] = $formacionProveedores;
    
        return $this;
    }

    /**
     * Remove formacionProveedores
     *
     * @param \Yuido\GestorBundle\Entity\FormacionProveedor $formacionProveedores
     */
    public function removeFormacionProveedore(\Yuido\GestorBundle\Entity\FormacionProveedor $formacionProveedores)
    {
        $this->formacionProveedores->removeElement($formacionProveedores);
    }

    /**
     * Get formacionProveedores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormacionProveedores()
    {
        return $this->formacionProveedores;
    }
}