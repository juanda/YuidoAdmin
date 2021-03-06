<?php

namespace Yuido\GestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Symfony\Component\Validator\Constraints as Assert;
use Yuido\FileManagerBundle\FileManageableInterfaz;

/**
 * Servidor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yuido\GestorBundle\Entity\ServidorRepository")
 */
class Servidor implements FileManageableInterfaz
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
     * @Assert\NotBlank()
     * @ORM\Column(name="empresa", type="string", length=255)
     */
    private $empresa;

    /**
     * @var string
     *
     * @Assert\Url()
     * @ORM\Column(name="url_panel_admin", type="string", length=255)
     */
    private $urlPanelAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="user_panel_admin", type="string", length=255)
     */
    private $userPanelAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="password_panel_admin", type="string", length=255)
     */
    private $passwordPanelAdmin;


    /**
     * @var string
     *
     * @ORM\Column(name="datos", type="text")
     */
    private $datos;

    
     ////////////  RELACIONES  //////////////
    
    /**
     * @ORM\OneToMany(targetEntity="ServicioServidor", mappedBy="servidor", cascade={"persist"}, orphanRemoval=true)
     */
    private $serviciosServidor;

    /**
     * @ORM\ManyToMany(targetEntity="\Yuido\FileManagerBundle\Entity\File")
     * @ORM\JoinTable(name="servidor_file",
     *      joinColumns={@ORM\JoinColumn(name="servidor_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="file_id", referencedColumnName="id", unique=true)})
     */
    private $files;
  
    
    ////////////////////////////////////////

    
    public function __toString()
    {
        //Error en Sonata si devuelve null, por eso tiene que devolver una cadena.
        return $this->getEmpresa() ?: '';
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
     * Set empresa
     *
     * @param string $empresa
     * @return Servidor
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    
        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set urlPanelAdmin
     *
     * @param string $urlPanelAdmin
     * @return Servidor
     */
    public function setUrlPanelAdmin($urlPanelAdmin)
    {
        $this->urlPanelAdmin = $urlPanelAdmin;
    
        return $this;
    }

    /**
     * Get urlPanelAdmin
     *
     * @return string 
     */
    public function getUrlPanelAdmin()
    {
        return $this->urlPanelAdmin;
    }

    /**
     * Set userPanelAdmin
     *
     * @param string $userPanelAdmin
     * @return Servidor
     */
    public function setUserPanelAdmin($userPanelAdmin)
    {
        $this->userPanelAdmin = $userPanelAdmin;
    
        return $this;
    }

    /**
     * Get userPanelAdmin
     *
     * @return string 
     */
    public function getUserPanelAdmin()
    {
        return $this->userPanelAdmin;
    }

    /**
     * Set passwordPanelAdmin
     *
     * @param string $passwordPanelAdmin
     * @return Servidor
     */
    public function setPasswordPanelAdmin($passwordPanelAdmin)
    {
        $this->passwordPanelAdmin = $passwordPanelAdmin;
    
        return $this;
    }

    /**
     * Get passwordPanelAdmin
     *
     * @return string 
     */
    public function getPasswordPanelAdmin()
    {
        return $this->passwordPanelAdmin;
    }

    /**
     * Set urlAdminUser
     *
     * @param string $urlAdminUser
     * @return Servidor
     */
    public function setUrlAdminUser($urlAdminUser)
    {
        $this->urlAdminUser = $urlAdminUser;
    
        return $this;
    }

    /**
     * Get urlAdminUser
     *
     * @return string 
     */
    public function getUrlAdminUser()
    {
        return $this->urlAdminUser;
    }

    /**
     * Set passwordAdminUser
     *
     * @param string $passwordAdminUser
     * @return Servidor
     */
    public function setPasswordAdminUser($passwordAdminUser)
    {
        $this->passwordAdminUser = $passwordAdminUser;
    
        return $this;
    }

    /**
     * Get passwordAdminUser
     *
     * @return string 
     */
    public function getPasswordAdminUser()
    {
        return $this->passwordAdminUser;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->serviciosServidor = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add serviciosServidor
     *
     * @param \Yuido\GestorBundle\Entity\ServicioServidor $serviciosServidor
     * @return Servidor
     */
    public function addServiciosServidor(\Yuido\GestorBundle\Entity\ServicioServidor $serviciosServidor)
    {
        $this->serviciosServidor[] = $serviciosServidor;
    
        return $this;
    }

    /**
     * Remove serviciosServidor
     *
     * @param \Yuido\GestorBundle\Entity\ServicioServidor $serviciosServidor
     */
    public function removeServiciosServidor(\Yuido\GestorBundle\Entity\ServicioServidor $serviciosServidor)
    {
        $this->serviciosServidor->removeElement($serviciosServidor);
    }

    /**
     * Get serviciosServidor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServiciosServidor()
    {
        return $this->serviciosServidor;
    }

    /**
     * Add proyectos
     *
     * @param \Yuido\GestorBundle\Entity\Proyecto $proyectos
     * @return Servidor
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

    /**
     * Add files
     *
     * @param \Yuido\FileManagerBundle\Entity\File $files
     * @return Servidor
     */
    public function addFile(\Yuido\FileManagerBundle\Entity\File $files)
    {
        $this->files[] = $files;

        return $this;
    }

    /**
     * Remove files
     *
     * @param \Yuido\FileManagerBundle\Entity\File $files
     */
    public function removeFile(\Yuido\FileManagerBundle\Entity\File $files)
    {
        $this->files->removeElement($files);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFiles()
    {
        return $this->files;
    }
}
