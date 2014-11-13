<?php

namespace Yuido\FileManagerBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class EntityWithFilesController extends Controller{

    public function fileManagerAction(){


        $id = $this->get('request')->get($this->admin->getIdParameter());

        $object = $this->admin->getObject($id);

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        if (false === $this->admin->isGranted('EDIT', $object)) {
            throw new AccessDeniedException();
        }

        $this->admin->setSubject($object);


        return $this->render('YuidoFileManagerBundle::fileManager.html.twig', array(
            'action'   => 'filemanager',
            'object'   => $object,
            'entity'   => get_class($object),
            'elements' => $this->admin->getShow(),
        ));

    }
} 