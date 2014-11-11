<?php
namespace Yuido\FileManagerBundle;

use Yuido\FileManagerBundle\Entity\File;

interface FileManageableInterfaz {
    public function getFiles();
    public function addFile(File $file);
    public function removeFile(File $file);

} 