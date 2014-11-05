<?php

namespace Jazzyweb\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Jazzyweb\UserBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;
    
    /**
     * @ORM\ManyToMany(targetEntity="Yuido\GestorBundle\Entity\HistoriaUsuario", mappedBy="usuarios")
     */
    protected $historiasUsuario;
    
    /**
     * @ORM\OneToMany(targetEntity="Yuido\GestorBundle\Entity\Visita", mappedBy="usuario")
     */
    protected $visitas;
    
    /**
     * @ORM\OneToMany(targetEntity="Yuido\GestorBundle\Entity\FormacionUser", mappedBy="usuario")
     */
    protected $formacionUsuarios;
    

    public function __construct()
    {
        parent::__construct();
    }

    
    public function __toString()
    {
        //Error en Sonata si devuelve null, por eso tiene que devolver una cadena.
        return $this->getUsername() ?: '';
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
}