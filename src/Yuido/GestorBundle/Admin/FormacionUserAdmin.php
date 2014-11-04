<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class FormacionUserAdmin extends Admin{
    
    private $colaboracion = array('ELABORACION' => 'Elaboración', 'MAQUETACION' => 'Maquetación', 'IMPARTICION' => 'Impartición',
                                  'COMERCIALIZACION' => 'Comercialización');
  
    protected function configureFormFields(FormMapper $formMapper)
    {      
//        $entity = $this->getObject($this->getSubject()->getId());
        
        $formMapper
            ->add('formacion', null, array('label' => 'Curso'))
            ->add('usuario', null, array('label' => 'Socio Yuido'))
            ->add('tipoColaboracion', 'choice', array(
                                       'choices' => $this->colaboracion, 
                                        'multiple' => true,
                                        'expanded' => false,
                                      )) ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('usuario', null, array('label' => 'Socio Yuido'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        
        $listMapper
            ->add('formacion', null, array('label' => 'Curso'))
            ->add('usuario', null, array('label' => 'Socio Yuido'))
//            ->add('tipoColaboracion', 'array', array('label' => 'Tipo Colaboración'))
            ->add('tipoColaboracion', 'array', array('template' => 'YuidoGestorBundle::field_colabora.html.twig'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }

}