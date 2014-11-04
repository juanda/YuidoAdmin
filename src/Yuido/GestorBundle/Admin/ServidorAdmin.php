<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class ServidorAdmin extends Admin{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('empresa', null, array('label' => 'Empresa'))
            ->add('urlPanelAdmin', null, array('label' => 'URL Panel Admin'))
            ->add('userPanelAdmin', null, array('label' => 'User Panel Admin'))
            ->add('passwordPanelAdmin', null, array('label' => 'password Panel Admin'))
            ->add('urlAdminUser', null, array('label' => 'URL Admin User'))
            ->add('passwordAdminUser', null, array('label' => 'Password Admin User'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('empresa', null, array('label' => 'Descripcion'))
            ->add('userPanelAdmin', null, array('label' => 'User Panel Admin'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('empresa', null, array('label' => 'Empresa'))
            ->add('urlPanelAdmin', null, array('label' => 'URL Panel Admin'))
            ->add('userPanelAdmin', null, array('label' => 'User Panel Admin'))
            ->add('passwordPanelAdmin', null, array('label' => 'password Panel Admin'))
            ->add('urlAdminUser', null, array('label' => 'URL Admin User'))
            ->add('passwordAdminUser', null, array('label' => 'Password Admin User'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }

}