<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class FormacionAdmin extends Admin{
    
    private $modalidadCurso = array('PENDIENTE' => 'Pendiente', 'ONLINE' => 'On-Line', 'PRESENCIAL' => 'Presencial');
    private $modalidadImporte = array('PENDIENTE' => 'Pendiente','PERSONA_INVIDIDUAL' => 'Persona Individual', 'GLOBAL' => 'Global');


    protected function configureFormFields(FormMapper $formMapper)
    {
        $entity = $this->getObject($this->getSubject()->getId());
        
        $formMapper
            ->add('clientes',null, array('by_reference' => false))
            ->add('curso', null, array('label' => 'Curso'))
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('fechaInicioCurso', 'datetime', array(
                'label' => 'Fecha Inicio Curso',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )))
            ->add('fechaFinCurso', 'datetime', array(
                'label' => 'Fecha Fin Curso',
                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd HH:mm',
                'attr' => array(
                    'class' => 'datepicker',
                )))
            ->add('horas', null, array('label' => 'Duración'))
            ->add('importe', null, array('label' => 'Importe'))
            ->add('modalidadCurso', 'choice', array(
                                        'choices' => $this->modalidadCurso, 
                                        'preferred_choices' => array( ($entity) ? $entity->getModalidadCurso(): '')))
            ->add('modalidadImporte', 'choice', array(
                                        'choices' => $this->modalidadImporte, 
                                        'preferred_choices' => array( ($entity) ? $entity->getModalidadImporte(): '')))
            ->add('aulas');
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('curso', null, array('label' => 'Curso'))
            ->add('modalidadImporte', null, array('label' => 'Modalidad Importe'))
            ->add('modalidadCurso', null, array('label' => 'Modalidad Curso'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('clientes',null, array('by_reference' => false))
            ->add('curso', null, array('label' => 'Curso'))
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('fechaInicioCurso', null, array('label' => 'Inicio Curso'))
            ->add('fechaFinCurso', null, array('label' => 'Fin Curso'))
            ->add('horas', null, array('label' => 'Duración'))
            ->add('importe', null, array('label' => 'Importe'))
            ->add('modalidadImporte', null, array('label' => 'Modalidad Importe'))
            ->add('modalidadCurso', null, array('label' => 'Modalidad Curso'))
            ->add('aulas')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }

}