<?php

class FileValidator {
    private $allowedExtensions;
    private $fileSizeLimit;

    public function __construct() {
        $this->allowedExtensions = ['doc', 'docx', 'pdf'];
        $this->fileSizeLimit = 1048576; 
    }

    public function validate($file) {
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileSize = $file['size'];

        if (!in_array($fileExtension, $this->allowedExtensions)) {
            return "Extensão de arquivo não permitida.";
        }

        if ($fileSize > $this->fileSizeLimit) {
            return "O arquivo excede o tamanho máximo permitido de 1MB.";
        }

        return null;
    }
}
?>
