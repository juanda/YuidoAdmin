<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;


class ServicioServidorAdmin extends Admin{
    
    
    private $periodos = array('DIARIO' => 'Diario', 'SEMANAL' => 'Semanal', 'MENSUAL' => 'Mensual', 
                       'TRIMESTRAL' => 'Trimestral', 'SEMESTRAL' => 'Semestral', 
                       'ANUAL' => 'Anual');

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('descripcion', null, array('label' => 'Descripcion'))
            ->add('username', null, array('label' => 'Username'))
            ->add('password', null, array('label' => 'Password'))
            ->add('importe', null, array('label' => 'Importe'))
            ->add('periodo', 'choice', array(
                                        'choices' => $this->periodos,
                                        'multiple' => false,
                                        'expanded' => false,
                                        'empty_data'  => -1))
            ->add('datos')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper){
        $showMapper
            ->add('descripcion', 'text')
            ->add('username', 'text')
            ->add('password', 'text')
            ->add('importe', 'text')
            ->add('periodo', 'text')
            ->add('datos', 'text')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('descripcion', null, array('label' => 'Descripcion'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('descripcion', null, array('label' => 'Descripcion'))
            ->add('username', null, array('label' => 'Username'))
            ->add('password', null, array('label' => 'Password'))
            ->add('importe', null, array('label' => 'Importe'))
            ->add('periodo', null, array('label' => 'Periodo'))
            ->add('servidor')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        // to remove a single route
        $collection->remove('create');

    }

}