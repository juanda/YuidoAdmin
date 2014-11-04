<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormacionProveedor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\FormacionProveedorRepository")
 */
class FormacionProveedor
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
     * @ORM\ManyToOne(targetEntity="Formacion", inversedBy="FormacionProveedores")
     */
    protected $formacion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Proveedor", inversedBy="FormacionProveedores")
     */
    protected $proveedor;
    
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
     * @param array $tipoColaboracion
     * @return FormacionProveedor
     */
    public function setTipoColaboracion($tipoColaboracion)
    {
        $this->tipoColaboracion = $tipoColaboracion;
    
        return $this;
    }

    /**
     * Get tipoColaboracion
     *
     * @return array 
     */
    public function getTipoColaboracion()
    {
        return $this->tipoColaboracion;
    }

    /**
     * Set formacion
     *
     * @param \Yuido\GestorBundle\Entity\Formacion $formacion
     * @return FormacionProveedor
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
     * Set proveedor
     *
     * @param \Yuido\GestorBundle\Entity\Proveedor $proveedor
     * @return FormacionProveedor
     */
    public function setProveedor(\Yuido\GestorBundle\Entity\Proveedor $proveedor = null)
    {
        $this->proveedor = $proveedor;
    
        return $this;
    }

    /**
     * Get proveedor
     *
     * @return \Yuido\GestorBundle\Entity\Proveedor 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }
}