<?php

namespace Yuido\FileManagerBundle\Admin;


use Faker\Provider\DateTime;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Sonata\AdminBundle\Validator\ErrorElement;


class FileAdmin extends Admin{


    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nombre Fichero'))
            ->add('file', 'file')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Fichero'));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, array('label' => 'Nombre Fichero'))
            ->add('path')
            ->add('mime_type')
            ->add('size')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )));
    }

    public function prePersist($file){

        if(!$file->getName()){
            $file->setName($file->getFile()->getClientOriginalName());
        }

        $container = $this->getConfigurationPool()->getContainer();

        $fileManager = $container->get('yuido_file_manager');

        $fileManager->upload($file);

        $file->setCreatedAt(new \DateTime());
    }

    public function preUpdate($file){

        // if the uploaded file is not null, then we are uploading another
        // file when updating the entity file.
        if($file->getFile()) {
            $container = $this->getConfigurationPool()->getContainer();

            $fileManager = $container->get('yuido_file_manager');

            // first delete the file referenced in field path of the $file
            $fileManager->delete($file);
            // Then upload the UploadedFile placed in the field file of the $file
            $fileManager->upload($file);
        }

        $file->setUpdatedAt(new \DateTime());

    }

    public function preRemove($file){

        $container = $this->getConfigurationPool()->getContainer();

        $fileManager = $container->get('yuido_file_manager');

        $fileManager->delete($file);

    }

}