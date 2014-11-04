<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class ClienteAdmin extends Admin{


    protected function configureFormFields(FormMapper $formMapper)
    {   
        $formMapper
            ->add('nombre', null, array('label' => 'Nombre Empresa'))
            ->add('contacto', null, array('label' => 'Contacto'))
            ->add('email', null, array('label' => 'Email'))
            ->add('telefono', null, array('label' => 'Teléfono'))
            ->add('telefono2', null, array('label' => 'Teléfono2'))           
            ->add('direccion', null, array('label' => 'Dirección'))
            ->add('urlWeb', null, array('label' => 'Url Web'))           
            ->add('actividad', null, array('label' => 'Actividad'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
             ->add('nombre', null, array('label' => 'Nombre Empresa'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nombre', null, array('label' => 'Nombre Empresa'))
            ->add('contacto', null, array('label' => 'Contacto'))
            ->add('email', null, array('label' => 'Email'))
            ->add('telefono', null, array('label' => 'Teléfono'))
            ->add('telefono2', null, array('label' => 'Teléfono2'))           
            ->add('direccion', null, array('label' => 'Dirección'))
            ->add('urlWeb', null, array('label' => 'Url Web'))           
            ->add('actividad', null, array('label' => 'Actividad'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }

}