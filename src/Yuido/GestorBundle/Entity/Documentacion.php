<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Documentacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\DocumentacionRepository")
 */
class Documentacion
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
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", nullable=true, 
     * columnDefinition="ENUM('PRESUPUESTO','DOC_CLIENTE','MANUAL_TECNICO','MANUAL_USUARIO','FACTURA','FORMACION','OTROS')")
     */
    private $tipo;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     *
     * @ORM\Column(name="path", type="text", nullable=true)
     */
    private $path;
    
    /**
    * @var \Symfony\Component\HttpFoundation\File\UploadedFile
    */
    protected $file;
    
    
     ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\ManyToOne(targetEntity="Proyecto", inversedBy="documentaciones")
     */
    protected $proyecto;
    
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Documentacion
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
     * Set tipo
     *
     * @param string $tipo
     * @return Documentacion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }


    /**
     * Set proyecto
     *
     * @param \Yuido\GestorBundle\Entity\Proyecto $proyecto
     * @return Documentacion
     */
    public function setProyecto(\Yuido\GestorBundle\Entity\Proyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;
    
        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \Yuido\GestorBundle\Entity\Proyecto 
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Documentacion
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
    
    
      /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    
}