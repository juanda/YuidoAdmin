<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;

class GastoProveedorAdmin extends Admin{

    protected function configureFormFields(FormMapper $formMapper)
    {                
        $formMapper
            ->add('proveedor')
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('fechaInicio', 'datetime', array(
                'label' => 'Fecha Inicio',
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
            ->add('importe', null, array('label' => 'Importe'))
            ->add('valoracion', null, array('label' => 'Valoracion'));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('proveedor', null, array('label' => 'Proveedor')) ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('proveedor')
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('fechaInicio', null, array('label' => 'Fecha Inicio'))
            ->add('fechaFin', null, array('label' => 'Fecha Fin'))
            ->add('importe', null, array('label' => 'Importe'))
            ->add('valoracion', null, array('label' => 'Valoracion'))
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

       $instance->setFechaInicio(\DateTime::createFromFormat('Y-m-d H:i:s', $now->format('Y-m-d H:i:s')));
       $instance->setFechaFin(\DateTime::createFromFormat('Y-m-d H:i:s', $now->format('Y-m-d H:i:s')));;

        return $instance;
    }

}