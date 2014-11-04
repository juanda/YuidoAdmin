<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class VisitaAdmin extends Admin{
    
  //Se ordena por defecto por titulo de artículo
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'fechaHora');
    
    protected function configureFormFields(FormMapper $formMapper)
    {                
        $formMapper
            ->add('cliente')
            ->add('fechaHora', 'datetime', array(
                'label' => 'Fecha Emisión Presu',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )
            ))   
            ->add('motivo', null, array('label' => 'Motivo'))
            ->add('observaciones', null, array('label' => 'Observaciones'))
            ->add('usuario');
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('motivo', null, array('label' => 'Motivo'))
            ->add('cliente', null, array('label' => 'Cliente')) ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('cliente')
            ->add('fechaHora', null, array('label' => 'Fecha/Hora'))
            ->add('motivo', null, array('label' => 'Motivo'))
            ->add('observaciones', null, array('label' => 'Observaciones'))
            ->add('usuario')
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
       
       
       $instance->setFechaHora(\DateTime::createFromFormat('Y-m-d H:i:s', $now->format('Y-m-d H:i:s')));
        
       return $instance;
   }

}