<?php
namespace Yuido\FileManagerBundle;


use Doctrine\ORM\EntityNotFoundException;
use Jazzyweb\FileUploader\FileUploader;
use Jazzyweb\FileUploader\UploadableEntityInterface;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\ValidatorInterface;
use Yuido\FileManagerBundle\Exception\NoFileManageableClassException;
use Yuido\FileManagerBundle\Exception\ObjectFileNotExistException;
use Yuido\FileManagerBundle\Exception\ObjectFileNotExistsException;
use Yuido\FileManagerBundle\Exception\ParentObjectNotExistException;

class FileManager {

    const ENTITY_CLASS_NOT_FOUND = 401;
    const ENTITY_NOT_FOUND = 402;

    private $fileUploader;
    private $validator;
    private $maxSize;
    private $mimeTypes;


    public function __construct(FileUploader $fileUploader, ValidatorInterface $validator,
                                $maxSize, $mimeTypes){
        $this->fileUploader = $fileUploader;
        $this->validator    = $validator;
        $this->maxSize      = $maxSize;
        $this->mimeTypes    = $mimeTypes;
    }

    /**
     * Valida el fichero asociado al objeto $object
     *
     * @param \Jazzyweb\FileUploader\UploadableEntityInterface $object
     * @return \Symfony\Component\Validator\ConstraintViolationListInterface
     */
    public function validate(\Jazzyweb\FileUploader\UploadableEntityInterface $object){
        $fileConstraint = new File();

        $fileConstraint->maxSize = $this->maxSize;
        $fileConstraint->mimeTypes = $this->mimeTypes;

        $errorList = $this->validator->validate($object->getFile(), $fileConstraint);

        return $errorList;

    }

    public function getFilePath(\Yuido\FileManagerBundle\Entity\File $file){

        $fs = new Filesystem();

        $filePath = $this->fileUploader->getUploadDir() . DIRECTORY_SEPARATOR . $file->getPath();

        if(!$fs->exists($filePath)){
            throw new FileNotFoundException('El fichero ' . $filePath . ' no existe');
        }

        return $filePath;

    }

    /**
     * Create a new File Object, moves the uploaded file to the correct directory, assign the uploaded file
     * to the created file object, and associates to the parent object given by $entityName and $entityId
     *
     * @param UploadedFile $uploadedFile
     * @param $entityName
     * @param $entityId
     * @return Entity\File
     * @throws NoFileManageableClassException
     * @throws ParentObjectNotExistException
     * @throws \Jazzyweb\FileUploader\FileUploaderException
     */
    public function uploadAndAssociate(UploadedFile $uploadedFile, $entityName, $entityId){

        $em = $this->fileUploader->getEntityManager();

        // Creamos la entidad con el fichero asociado
        $file = $this->createNewFile($uploadedFile);

        $parentObject = $this->getParentObject($entityName, $entityId);

        $dir = $this->parse_classname($entityName);

        $fs = new Filesystem();

        $fs->mkdir($this->fileUploader->getUploadDir() . DIRECTORY_SEPARATOR . $dir);

        $this->fileUploader->upload($file, $dir);

        $parentObject->addFile($file);

        $em->persist($parentObject);
        $em->flush();

        return $file;
    }

    /**
     * Dessasociate the File object which id is $fileId from the parent object given by $entityName and
     * $entityId. Then delete the physical file and the File object.
     *
     * @param $fileId
     * @param $entityName
     * @param $entityId
     * @return mixed
     * @throws NoFileManageableClassException
     * @throws ObjectFileNotExistException
     * @throws ParentObjectNotExistException
     */
    public function dessasociateAndDelete($fileId, $entityName, $entityId){
        $em = $this->fileUploader->getEntityManager();

        $repoFile = $em->getRepository('Yuido\FileManagerBundle\Entity\File');

        $file = $repoFile->find($fileId);

        if(!$file instanceof \Yuido\FileManagerBundle\Entity\File){
            throw new ObjectFileNotExistException("El fichero $fileId no existe");
        }

        // Delete the associated file (physical)
        $this->delete($file);

        $parentObject = $this->getParentObject($entityName, $entityId);

        $parentObject->removeFile($file);

        $em->remove($file);
        $em->persist($parentObject);
        $em->flush();

        return $fileId;

    }

    /**
     *
     * Get the File objects associated to a parent object given by $entityName and $entityId
     *
     * @param $entityName
     * @param $entityId
     * @return mixed
     */
    public function get($entityName, $entityId){
        $parentObject = $this->getParentObject($entityName, $entityId);

        $files = $parentObject->getFiles();

        return $files;
    }

    /**
     * Upload the uploaded file contained in $file
     *
     * @param $file
     * @throws \Jazzyweb\FileUploader\FileUploaderException
     */
    public function upload($file){

        $this->characterize($file, $file->getFile());

        $this->fileUploader->upload($file);

        return $file;
    }

    /**
     * Removes the file referenced in field path of a file object
     *
     * @param UploadableEntityInterface $object
     * @return bool
     */
    public function delete(UploadableEntityInterface $object){

        $fs = new Filesystem();
        $uploadDir = $this->fileUploader->getUploadDir();
        $path = $object->getPath();

        $file = $uploadDir . DIRECTORY_SEPARATOR . $path;

        if(!$fs->exists($file)){
            return false;
        }

        $fs->remove($file);
        return true;
    }

    /**
     * Creates a new File from an uploadedFile
     *
     * @param UploadedFile $uploadedFile
     * @return Entity\File
     */
    protected function createNewFile(UploadedFile $uploadedFile){

        $file = new \Yuido\FileManagerBundle\Entity\File();

        $this->characterize($file, $uploadedFile);

        return $file;
    }

    protected function getParentObject($entityName, $entityId){
        $em = $this->fileUploader->getEntityManager();
        $repo = $em->getRepository($entityName);
        $parentObject = $repo->find($entityId);

        $this->checkParentObject($parentObject);

        return $parentObject;
    }

    protected function characterize(\Yuido\FileManagerBundle\Entity\File $file, UploadedFile $uploadedFile){

        $file->setFile($uploadedFile);
        $file->setSize($uploadedFile->getSize());
        $file->setMimeType($uploadedFile->getMimeType());
        $file->setMd5(md5_file($uploadedFile->getPath(). DIRECTORY_SEPARATOR . $uploadedFile->getFilename()));
        $file->setName($uploadedFile->getClientOriginalName());

        return $file;
    }

    protected function checkParentObject($object){

        if($object == null){
            throw new ParentObjectNotExistException("El Objeto padre no existe");
        }
        if(!$object instanceof FileManageableInterfaz){
            throw new NoFileManageableClassException("El Objeto padre debe implementar la interfaz FileManageableInterfaz");
        }
    }

    protected function parse_classname ($name)
    {
        return join('', array_slice(explode('\\', $name), -1));
    }

} 