<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class YuidoEmpresaAdmin extends Admin{


    protected function configureFormFields(FormMapper $formMapper)
    {   
        $formMapper
            ->add('cif', null, array('label' => 'CIF'))
            ->add('razonSocial', null, array('label' => 'Razón Social'))
            ->add('capitalSocial', null, array('label' => 'Capital Social'))
            ->add('tipoSociedad', null, array('label' => 'Tipo Sociedad'))
            ->add('descripcion', null, array('label' => 'Descripcion'))           
            ->add('notaria', null, array('label' => 'Notaria'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('cif', null, array('label' => 'CIF'))
            ->add('razonSocial', null, array('label' => 'Razón Social'))
            ->add('capitalSocial', null, array('label' => 'Capitall Social'))
            ->add('tipoSociedad', null, array('label' => 'Tipo Sociedad'))
            ->add('descripcion', null, array('label' => 'Descripcion'))           
            ->add('notaria', null, array('label' => 'Notaria'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }

}