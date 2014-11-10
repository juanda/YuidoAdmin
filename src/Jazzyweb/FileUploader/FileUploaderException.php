<?php
namespace Jazzyweb\FileUploader;
class FileUploaderException extends \Exception{
    const ERROR_OBJECTO_SIN_FICHERO = 1;
    const ERROR_NO_EXISTE_EL_DIRECTORIO = 2;
    const ERROR_NO_SE_PUEDE_ESCRIBIR_EN_DIRECTORIO = 3;

}
