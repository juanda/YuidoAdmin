<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class MasterClassAdmin extends Admin{
    
  
    protected function configureFormFields(FormMapper $formMapper)
    {                
        $formMapper
            ->add('formacion', null, array('label' => 'Curso', 'required' => true))
                
            ->add('fechaDesde', 'datetime', array(
                'label' => 'Fecha/Hora Desde',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )
            ))
            ->add('fechaHasta', 'datetime', array(
                'label' => 'Fecha Fin',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )
            ))
//            ->add('fechaDesde', null, array('label' => 'Fecha/Hora Desde'))
//            ->add('fechaHasta', null, array('label' => 'Fecha/Hora Hasta'))
            ->add('observaciones', null, array('label' => 'Observaciones'))
            ->add('aula');
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('formacion', null, array('label' => 'Cursos'))
            ->add('aula', null, array('label' => 'Aulas')) ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('formacion', null, array('label' => 'Curso'))
            ->add('fechaDesde', null, array('label' => 'Fecha/Hora Desde'))
            ->add('fechaHasta', null, array('label' => 'Fecha/Hora Hasta'))
            ->add('observaciones', null, array('label' => 'Observaciones'))
            ->add('aula')
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
       
       $instance->setFechaDesde(\DateTime::createFromFormat('Y-m-d H:i:s', $now->format('Y-m-d H:i:s')));
       $instance->setFechaHasta(\DateTime::createFromFormat('Y-m-d H:i:s', $now->format('Y-m-d H:i:s')));
        
       return $instance;
   }

}