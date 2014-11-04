<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class ProyectoAdmin extends Admin{

    private $estado = array('PENDIENTE' => 'Pendiente Aceptación', 'ACEPTADO' => 'Aceptado', 'RECHAZADO' => 'Rechazado',
                        'EN_EJECUCION' => 'En Ejecución', 'ANULADO_EN_EJECUCION' => 'Anulado en Ejecución', 
                        'REALIZADO' => 'Realizado');

    protected function configureFormFields(FormMapper $formMapper)
    {
        //Se obtiene la entidad
        $entity = $this->getObject($this->getSubject()->getId());
        
        $formMapper
            ->add('cliente',null, array('label' => 'Cliente', 'required' => true))
            ->add('nombre', null, array('label' => 'Nombre Proyecto', 'required' => true))
            ->add('descripcion', null, array('label' => 'Descripción', 'required' => true))
            ->add('codigoPresu', null, array('label' => 'Código Presupuesto', 'required' => true))
            ->add('fechaEmisionPresu', 'datetime', array(
                'label' => 'Fecha Emisión Presu',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )
            ))   
              ->add('fechaIniPresu', 'datetime', array(
                'label' => 'Fecha Inicio Presu',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )
            ))  
            ->add('fechaFinPresu', 'datetime', array(
                'label' => 'Fecha Fin Presu',
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
            ->add('estado', 'choice', array(
                                        'choices' => $this->estado, 
                                        'preferred_choices' => array( ($entity) ? $entity->getEstado(): ''),
                                        'multiple' => false,
                                        'expanded' => false,
                                        'empty_data'  => -1))
            ->add('importe', null, array('label' => 'Importe'))
            ->add('serviciosServidor');
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre', null, array('label' => 'Nombre Proyecto'))
            ->add('estado', null, array('label' => 'Estado')) ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('cliente',null, array('label' => 'Cliente'))
            ->add('nombre', null, array('label' => 'Nombre Proyecto'))
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('codigoPresu', null, array('label' => 'Código Presupuesto'))
            ->add('fechaEmisionPresu', null, array('label' => 'Fecha Emision Presu'))
            ->add('fechaIniPresu', null, array('label' => 'Fecha Inicio Presu'))
            ->add('fechaFinPresu', null, array('label' => 'Fecha Fin Presu'))
            ->add('fechaFin', null, array('label' => 'Fecha Fin'))  
            ->add('estado', null, array('label' => 'Estado')) 
//            ->add('sprints')
//            ->add('sprints.usuario')
            ->add('serviciosServidor')
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
       
       $instance->setFechaEmisionPresu(\DateTime::createFromFormat('Y-m-d H:i:s', $now->format('Y-m-d H:i:s')));
       $instance->setFechaIniPresu(null);
       $instance->setFechaFinPresu(null);
       $instance->setFechaFin(null);
        
       return $instance;
   }

}