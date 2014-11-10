<?php

namespace Jazzyweb\FileUploader;
class FileUploader {
    private $uploadDir;
    private $entityManager;

    public function __construct($uploadDir, \Doctrine\ORM\EntityManager $entityManager) {
        $this->uploadDir = $uploadDir;
        $this->entityManager = $entityManager;
    }

    /**
     * @param UploadableEntityInterface $object
     * @param null $dir
     * @return UploadableEntityInterface
     * @throws FileUploaderException
     */
    public function upload(UploadableEntityInterface $object, $dir = null) {
        if (null === $object->getFile()) {
            $msg = "El objecto no tiene fichero asociado";
            $code = FileUploaderException::ERROR_OBJECTO_SIN_FICHERO;
            throw new FileUploaderException($msg, $code);
        }

        if (!file_exists($this->uploadDir)) {
            $msg = "El directorio  $this->uploadDir no existe";
            $code = FileUploaderException::ERROR_NO_EXISTE_EL_DIRECTORIO;
            throw new FileUploaderException($msg, $code);
        }

        if (!is_writable($this->uploadDir)) {
            $msg = "No se puede escribir en el directorio $this->uploadDir";
            $code = FileUploaderException::ERROR_NO_SE_PUEDE_ESCRIBIR_EN_DIRECTORIO;
            throw new FileUploaderException();
        }

        $filename = sha1(uniqid(mt_rand(), true)) . '.' . $object->getFile()->guessExtension();

        if (is_null($dir)) {
            $absoluteDir = $this->uploadDir;
            $path = $filename;
        } else {
            $absoluteDir = $this->uploadDir . DIRECTORY_SEPARATOR . $dir;
            $path = $dir . DIRECTORY_SEPARATOR . $filename;
        }

        $object->getFile()->move($absoluteDir, $filename);
        $object->setPath($path);
        $this->entityManager->persist($object);
        $this->entityManager->flush();

        return $object;
    }

    public function getAbsolutePath(UploadableEntityInterface $object) {
        return null === $object->getPath() ? null : $this->uploadDir . DIRECTORY_SEPARATOR . $object->getPath();
    }

    public function getUploadDir(){
        return $this->uploadDir;
    }

    public function getEntityManager(){
        return $this->entityManager;
    }

}
