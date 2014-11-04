<?php

namespace Jazzyweb\FileUploader;
class FileUploader {
private $uploadDir;
private $entityManager;

    public function __construct($uploadDir, \Doctrine\ORM\EntityManager $entityManager) {
        $this->uploadDir = $uploadDir;
        $this->entityManager = $entityManager;
    }

    public function upload(UploadableEntityInterface $object, $dir = null) {
        if (null === $object->getFile()) {
        return;
    }
    
    if (!file_exists($this->uploadDir)) {
    throw new FileUploaderException('El directorio ' . $this->uploadDir . ' no existe');
    }
    
    if (!is_writable($this->uploadDir)) {
    throw new FileUploaderException('No se puede escribir en el directorio ' . $this->uploadDir);
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
}

    public function getAbsolutePath(UploadableEntityInterface $object) {
    return null === $object->getPath() ? null : $this->uploadDir . DIRECTORY_SEPARATOR . $object->getPath();
}

}
