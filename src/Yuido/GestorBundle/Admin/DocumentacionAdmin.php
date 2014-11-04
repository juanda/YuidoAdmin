<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class DocumentacionAdmin extends Admin{
    
    private $tipo = array('PRESUPUESTO' => 'Presupuesto', 'DOC_CLIENTE' => 'Documentación aportada por Cliente', 
                        'MANUAL_TECNICO' => 'Manual Técnico',
                        'MANUAL_USUARIO' => 'Manual Usuario', 'FACTURA' => 'Factura', 
                        'FORMACION' => 'Formación','OTROS' => 'Otros');

    
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $entity = $this->getObject($this->getSubject()->getId());

        $formMapper
            ->add('proyecto')
            ->add('descripcion', null, array('label' => 'Descripción', 'required' => false))
            ->add('tipo', 'choice', array(
                                        'choices' => $this->tipo, 
                                        'preferred_choices' => array( ($entity) ? $entity->getTipo(): ''),
                                        'multiple' => false,
                                        'expanded' => false,
                                        'empty_data'  => -1))
            ->add('file', 'file', array('label' => 'Fichero', 'required' => false));          
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('tipo', null, array('label' => 'Tipo'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('proyecto.cliente', null, array('label' => 'Cliente'))
            ->add('proyecto')
            ->add('descripcion', null, array('label' => 'Descripción'))
            ->add('tipo', null, array('label' => 'Tipo'))
            ->add('path', null, array('label' => 'Fichero','template' => 'YuidoGestorBundle::plantilla_file.html.twig'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }
    
      
//    public function prePersist($product) {
//        $this->saveFile($product);
//    }
//
//    public function preUpdate($product) {
//        $this->saveFile($product);
//    }
//
//    public function saveFile($product) {
//        $basepath = $this->getRequest()->getBasePath();
//        $product->upload($basepath);
//    }
    

}