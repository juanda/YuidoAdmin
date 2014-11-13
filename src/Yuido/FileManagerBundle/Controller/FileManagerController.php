<?php

namespace Yuido\FileManagerBundle\Controller;


use Doctrine\Common\Persistence\Mapping\MappingException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Yuido\FileManagerBundle\Entity\File;
use Yuido\FileManagerBundle\Exception\NoUploadedFileException;
use Yuido\FileManagerBundle\Exception\ObjectFileNotExistException;

class FileManagerController extends Controller
{
    protected function renderJson($data, $status = 200, $headers = array())
    {
        // fake content-type so browser does not show the download popup when this
        // response is rendered through an iframe (used by the jquery.form.js plugin)
        //  => don't know yet if it is the best solution
        if ($this->get('request')->get('_xml_http_request')
            && strpos($this->get('request')->headers->get('Content-Type'), 'multipart/form-data') === 0) {
            $headers['Content-Type'] = 'text/plain';
        } else {
            $headers['Content-Type'] = 'application/json';
        }

        return new Response(json_encode($data), $status, $headers);
    }

    /**
     * Returns true if the request is a XMLHttpRequest.
     *
     * @return bool True if the request is an XMLHttpRequest, false otherwise
     */
    protected function isXmlHttpRequest()
    {
        return $this->get('request')->isXmlHttpRequest() || $this->get('request')->get('_xml_http_request');
    }


    public function uploadAction($entityName, $entityId, Request $request)
    {
//        if(!$this->isXmlHttpRequest()){
//            throw new NotAcceptableHttpException("Esta acción solo puede ser usada como XmlHttpRequest");
//        }

        try {
            $filemanager = $this->get('yuido_file_manager');

            $uploadedFile = $request->files->get('file');

            if(!$uploadedFile instanceof UploadedFile){
                throw new NoUploadedFileException("No se ha envíado ningún fichero en la request");
            }

            $file = $filemanager->uploadAndAssociate($uploadedFile, $entityName, $entityId);

            return $this->renderJson($file->toArray());

        }catch (MappingException $e){
            $error['msg'] = "La entidad $entityName no existe";
            $error['code'] = 404;

            return $this->renderJson($error, 404);
        }catch(NoUploadedFileException $e){
            $error['msg'] = $e->getMessage();
            $error['code'] = 404;

            return $this->renderJson($error, 404);
        }catch(\Exception $e){
            $error['msg'] = "Excepción no controlada: " . $e->getMessage();
            $error['code'] = 404;

            return $this->renderJson($error, 500);
        }
    }

    public function deleteAction($fileId, $entityName, $entityId){
        try{
            $filemanager = $this->get('yuido_file_manager');
            $filemanager->dessasociateAndDelete($fileId, $entityName, $entityId);

            return $this->renderJson(array('msg' => 'fichero ' .$fileId .' eliminado y desasociado'));
        }catch (ObjectFileNotExistException $e){
            $error['msg'] = $e->getMessage();
            $error['code'] = 404;

            return $this->renderJson($error, 500);
        }catch (\Exception $e){
            $error['msg'] = "Excepción no controlada: " . $e->getMessage();
            $error['code'] = 404;

            return $this->renderJson($error, 500);
        }
    }

    public function getAction($entityName, $entityId){
        try{
            $filemanager = $this->get('yuido_file_manager');
            $files = $filemanager->get($entityName, $entityId);

            $arrFiles = array();
            foreach ($files as $file) {
                $arrFiles[] = $file->toArray();
            }

            return $this->renderJson($arrFiles);


        }catch (\Exception $e){
            $error['msg'] = "Excepción no controlada: " . $e->getMessage();
            $error['code'] = 404;

            return $this->renderJson($error, 500);
        }
    }

    public function downloadAction($fileId){

        $fileRepo = $this->getDoctrine()->getManager()->getRepository('YuidoFileManagerBundle:File');

        $file = $fileRepo->find($fileId);

        if(!$file instanceof File){
            throw new NotFoundHttpException('No se encuentra el fichero con id ' . $fileId);
        }

        $filemanager = $this->get('yuido_file_manager');

        $response = new BinaryFileResponse($filePath);



    }


    public function testAction(){

        return $this->render('YuidoFileManagerBundle::test.html.twig');
    }
}
