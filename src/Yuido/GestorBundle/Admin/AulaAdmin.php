<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class AulaAdmin extends Admin{


    protected function configureFormFields(FormMapper $formMapper)
    {   
        $formMapper
            ->add('nombre', null, array('label' => 'Nombre Aula'))
            ->add('contacto', null, array('label' => 'Contacto')) 
            ->add('direccion', null, array('label' => 'Dirección'))
            ->add('email', null, array('label' => 'Email'))
            ->add('telefono', null, array('label' => 'Teléfono'))
            ->add('aforo', null, array('label' => 'Aforo'))                       
            ->add('contacto', null, array('label' => 'Contacto'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
             ->add('nombre', null, array('label' => 'Aula'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nombre', null, array('label' => 'Nombre Aula'))
            ->add('direccion', null, array('label' => 'Dirección'))
            ->add('email', null, array('label' => 'Email'))
            ->add('telefono', null, array('label' => 'Teléfono'))
            ->add('aforo', null, array('label' => 'Aforo'))                                 
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }

}