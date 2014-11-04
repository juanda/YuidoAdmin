<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proveedor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\ProveedorRepository")
 */
class Proveedor
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
     * @ORM\Column(name="servicioPrestado", type="string", length=255)
     */
    private $servicioPrestado;

    
    
    ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\OneToMany(targetEntity="GastoProveedor", mappedBy="proveedor")
     */
    protected $gastosProveedor;
    
   /**
     * @ORM\ManyToMany(targetEntity="historiaUsuario", mappedBy="proveedores")
     */
    protected $historiasUsuario;
    
    /**
     * @ORM\OneToMany(targetEntity="FormacionProveedor", mappedBy="proveedor")
     */
    protected $formacionProveedores;
     
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
     * @return Proveedor
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
     * Set email
     *
     * @param string $email
     * @return Proveedor
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
     * @return Proveedor
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
     * @return Proveedor
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
     * @return Proveedor
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
     * @return Proveedor
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
     * @return Proveedor
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
     * Set servicioPrestado
     *
     * @param string $servicioPrestado
     * @return Proveedor
     */
    public function setServicioPrestado($servicioPrestado)
    {
        $this->servicioPrestado = $servicioPrestado;
    
        return $this;
    }

    /**
     * Get servicioPrestado
     *
     * @return string 
     */
    public function getServicioPrestado()
    {
        return $this->servicioPrestado;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gastosProveedor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sprints = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add gastosProveedor
     *
     * @param \Yuido\GestorBundle\Entity\GastoProveedor $gastosProveedor
     * @return Proveedor
     */
    public function addGastosProveedor(\Yuido\GestorBundle\Entity\GastoProveedor $gastosProveedor)
    {
        $this->gastosProveedor[] = $gastosProveedor;
    
        return $this;
    }

    /**
     * Remove gastosProveedor
     *
     * @param \Yuido\GestorBundle\Entity\GastoProveedor $gastosProveedor
     */
    public function removeGastosProveedor(\Yuido\GestorBundle\Entity\GastoProveedor $gastosProveedor)
    {
        $this->gastosProveedor->removeElement($gastosProveedor);
    }

    /**
     * Get gastosProveedor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGastosProveedor()
    {
        return $this->gastosProveedor;
    }

    /**
     * Add sprints
     *
     * @param \Yuido\GestorBundle\Entity\Sprint $sprints
     * @return Proveedor
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
     * Add formacionProveedores
     *
     * @param \Yuido\GestorBundle\Entity\FormacionProveedor $formacionProveedores
     * @return Proveedor
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

    /**
     * Add historiasUsuario
     *
     * @param \Yuido\GestorBundle\Entity\historiaUsuario $historiasUsuario
     * @return Proveedor
     */
    public function addHistoriasUsuario(\Yuido\GestorBundle\Entity\historiaUsuario $historiasUsuario)
    {
        $this->historiasUsuario[] = $historiasUsuario;
    
        return $this;
    }

    /**
     * Remove historiasUsuario
     *
     * @param \Yuido\GestorBundle\Entity\historiaUsuario $historiasUsuario
     */
    public function removeHistoriasUsuario(\Yuido\GestorBundle\Entity\historiaUsuario $historiasUsuario)
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
}