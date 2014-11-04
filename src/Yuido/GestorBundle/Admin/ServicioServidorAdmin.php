<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class ServicioServidorAdmin extends Admin{
    
    
    private $periodos = array('DIARIO' => 'Diario', 'SEMANAL' => 'Semanal', 'MENSUAL' => 'Mensual', 
                       'TRIMESTRAL' => 'Trimestral', 'SEMESTRAL' => 'Semestral', 
                       'ANUAL' => 'Anual');

    protected function configureFormFields(FormMapper $formMapper)
    {
        //Se obtiene la entidad
        $entity = $this->getObject($this->getSubject()->getId());
        
        $formMapper
            ->add('descripcion', null, array('label' => 'Descripcion'))
            ->add('username', null, array('label' => 'Username'))
            ->add('password', null, array('label' => 'Password'))
            ->add('importe', null, array('label' => 'Importe'))
            ->add('periodo', 'choice', array(
                                        'choices' => $this->periodos, 
                                        'preferred_choices' => array( ($entity) ? $entity->getPeriodo(): ''),
                                        'multiple' => false,
                                        'expanded' => false,
                                        'empty_data'  => -1))
            ->add('servidor');
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

}