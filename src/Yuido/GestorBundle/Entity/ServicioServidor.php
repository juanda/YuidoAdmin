<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * ServicioServidor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\ServicioServidorRepository")
 */
class ServicioServidor
{
    use ORMBehaviors\Timestampable\Timestampable;
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
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="importe", type="integer")
     */
    private $importe;


    /**
     * @var string
     * @ORM\Column(name="periodo", type="string", nullable=true, columnDefinition="ENUM('DIARIO','MENSUAL','TRIMESTRAL','ANUAL')")
     */
    private $periodo;

    /**
     * @var string
     *
     * @ORM\Column(name="datos", type="text")
     */
    private $datos;




    ////////////  RELACIONES  //////////////

    /**
     * @ORM\ManyToOne(targetEntity="Servidor", inversedBy="serviciosServidor")
     */
    protected $servidor;

    /**
     * @ORM\ManyToMany(targetEntity="Proyecto", mappedBy="serviciosServidor")
     */
    protected $proyectos;

    ////////////////////////////////////////


    public function __toString()
    {
        //Error en Sonata si devuelve null, por eso tiene que devolver una cadena.
        return $this->getDescripcion() ?: '';
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return ServicioServidor
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
     * Set username
     *
     * @param string $username
     * @return ServicioServidor
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return ServicioServidor
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * Set servidor
     *
     * @param \Yuido\GestorBundle\Entity\Servidor $servidor
     * @return ServicioServidor
     */
    public function setServidor(\Yuido\GestorBundle\Entity\Servidor $servidor = null)
    {
        $this->servidor = $servidor;

        return $this;
    }

    /**
     * Get servidor
     *
     * @return \Yuido\GestorBundle\Entity\Servidor
     */
    public function getServidor()
    {
        return $this->servidor;
    }


    /**
     * Set importe
     *
     * @param integer $importe
     * @return ServicioServidor
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
     * Set periodo
     *
     * @param string $periodo
     * @return ServicioServidor
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return string
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proyectos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add proyectos
     *
     * @param \Yuido\GestorBundle\Entity\Proyecto $proyectos
     * @return ServicioServidor
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
     * @return string
     */
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * @param string $datos
     */
    public function setDatos($datos)
    {
        $this->datos = $datos;
    }
}
