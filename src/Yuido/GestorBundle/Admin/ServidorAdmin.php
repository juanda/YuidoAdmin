<?php

namespace Yuido\GestorBundle\Admin;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;


class ServidorAdmin extends Admin{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $action = $this->getSubject() && !$this->getSubject()->getId() ? "Create" : "Edit";

        $formMapper
            ->add('empresa', null, array('label' => 'Empresa'))
            ->add('urlPanelAdmin', null, array('label' => 'URL Panel Admin'))
            ->add('userPanelAdmin', null, array('label' => 'User Panel Admin'))
            ->add('passwordPanelAdmin', null, array('label' => 'password Panel Admin'))
            ->add('datos', null, array('label' =>'Datos' ))
            ;

        if($action == "Edit"){
            $formMapper->add('serviciosServidor', 'sonata_type_collection',array(), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
            ))
            ;
        }
    }

    protected function configureShowFields(ShowMapper $showMapper){
        $showMapper
            ->add('empresa', 'text')
            ->add('urlPanelAdmin', 'text')
            ->add('userPanelAdmin', 'text')
            ->add('passwordPanelAdmin', 'text')
            ->add('datos', 'text')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('empresa', null, array('label' => 'Descripcion'))
            ->add('userPanelAdmin', null, array('label' => 'User Panel Admin'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('empresa', null, array('label' => 'Empresa'))
            ->add('urlPanelAdmin', null, array('label' => 'URL Panel Admin'))
            ->add('userPanelAdmin', null, array('label' => 'User Panel Admin'))
            ->add('passwordPanelAdmin', null, array('label' => 'password Panel Admin'))
            ->add('serviciosServidor', null, array('template' => 'YuidoGestorBundle:Servidor:servicios.html.twig' ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )));
    }

    public function preUpdate($servidor){

        $this->getForm()->getData()->getServiciosServidor()->map(function ($servicio) use($servidor){

            $servicio->setServidor($servidor);

        });
    }

}