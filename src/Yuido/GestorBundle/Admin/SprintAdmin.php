<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class SprintAdmin extends Admin{
    
    private $exito = array('EN_PROCESO' => 'En Proceso', 'SI' => 'Si', 'NO' => 'No');

   
    protected function configureFormFields(FormMapper $formMapper)
    {   
        $entity = $this->getObject($this->getSubject()->getId());
               
        $formMapper
            ->add('proyecto')
            ->add('nombre', null, array('label' => 'Nombre'))
            ->add('fechaInicioSprint', 'datetime', array(
                'label' => 'Fecha Inicio Sprint',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )
            ))  
            ->add('fechaFinSprint', 'datetime', array(
                'label' => 'Fecha Fin Sprint',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )
            ))   
            ->add('fechaFin', 'datetime', array(
                'label' => 'Fecha Fin',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )
            )) 
            ->add('exito', 'choice', array(
                                        'label' => 'Exito Sprint',
                                        'choices' => $this->exito, 
                                        'preferred_choices' => array( ($entity) ? $entity->getExito(): ''),
                                        'multiple' => false,
                                        'expanded' => false,
                                        'empty_data'  => -1))
            ->add('observaciones', null, array('label' => 'Observaciones'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('proyecto')
            ->add('nombre', null, array('label' => 'Sprint'))
            ->add('exito', null, array('label' => 'Exito Sprint')) ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('proyecto')
            ->add('nombre', null, array('label' => 'Nombre'))
            ->add('fechaInicioSprint', null, array('label' => 'Fecha Inicio Sprint'))
            ->add('fechaFinSprint', null, array('label' => 'Fecha Fin Sprint'))
            ->add('fechaFin', null, array('label' => 'Fin Historias Usuario'))
            ->add('observaciones', null, array('label' => 'Observaciones'))
            ->add('exito', null, array('label' => 'Exito'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }
    
    
    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $now = new \DateTime('NOW');

        $instance->setFechaInicioSprint(\DateTime::createFromFormat('Y-m-d H:i:s', $now->format('Y-m-d H:i:s')));
        $instance->setFechaFinSprint(\DateTime::createFromFormat('Y-m-d H:i:s', $now->format('Y-m-d H:i:s')));;
        $instance->setFechaFin(null);

        return $instance;
    }

}