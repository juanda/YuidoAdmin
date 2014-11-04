<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class HistoriaUsuarioAdmin extends Admin{
    
    private $riesgo = array('BAJO' => 'Bajo', 'MEDIO' => 'Medio', 'ALTO' => 'Alto');

   
    protected function configureFormFields(FormMapper $formMapper)
    {   
        $entity = $this->getObject($this->getSubject()->getId());
               
        $formMapper
            ->add('sprint')
            ->add('usuarios', null, array('label' => 'Usuario'))
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('puntos', null, array('label' => 'Puntos'))
            ->add('riesgo', 'choice', array(
                                        'label' => 'Riesgo',
                                        'choices' => $this->riesgo, 
                                        'preferred_choices' => array( ($entity) ? $entity->getRiesgo(): ''),
                                        'multiple' => false,
                                        'expanded' => false,
                                        'empty_data'  => -1))
            ->add('observaciones', null, array('label' => 'Observaciones'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('sprint')
            ->add('descripcion', null, array('label' => 'Tareas'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('sprint')
            ->add('usuarios', null, array('label' => 'Usuario'))
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('puntos', null, array('label' => 'Usuario'))
            ->add('riesgo', 'choice', array('label' => 'Riesgo'))
            ->add('observaciones', null, array('label' => 'Observaciones'))
            ->add('hecho', null, array('editable' => true, 'label' => 'Hecho'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }
    


}