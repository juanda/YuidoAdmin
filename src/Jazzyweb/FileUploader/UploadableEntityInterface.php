<?php
    namespace Jazzyweb\FileUploader;
    interface UploadableEntityInterface {
    public function getPath();
    public function setPath($path);
    public function getFile();
    public function setFile(\Symfony\Component\HttpFoundation\File\UploadedFile $file);

}
