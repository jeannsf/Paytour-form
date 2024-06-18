<?php 
function validaArquivo($file)
{
    $allowedExtensions = ['doc', 'docx', 'pdf'];
    $fileSizeLimit = 1048576; 
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileSize = $file['size'];

    if (!in_array($fileExtension, $allowedExtensions)) {
        return "Extensão de arquivo não permitida.";
    }

    if ($fileSize > $fileSizeLimit) {
        return "O arquivo excede o tamanho máximo permitido de 1MB.";
    }

    return null;
}