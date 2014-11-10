<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GastoProveedor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\GastoProveedorRepository")
 */
class GastoProveedor
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicio", type="date")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin", type="date")
     */
    private $fechaFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="importe", type="integer")
     */
    private $importe;

    /**
     * @var string
     *
     * @ORM\Column(name="valoracion", type="string", length=255)
     */
    private $valoracion;


    ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\ManyToOne(targetEntity="Proveedor", inversedBy="gastosProveedor")
     */
    protected $proveedor;
    
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
     * Set proveedor
     *
     * @param string $proveedor
     * @return GastoProveedor
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    
        return $this;
    }

    /**
     * Get proveedor
     *
     * @return string 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return GastoProveedor
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return GastoProveedor
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return GastoProveedor
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
     * Set importe
     *
     * @param integer $importe
     * @return GastoProveedor
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
     * Set valoracion
     *
     * @param string $valoracion
     * @return GastoProveedor
     */
    public function setValoracion($valoracion)
    {
        $this->valoracion = $valoracion;
    
        return $this;
    }

    /**
     * Get valoracion
     *
     * @return string 
     */
    public function getValoracion()
    {
        return $this->valoracion;
    }
}
