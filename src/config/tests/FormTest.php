<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../FileValidator.php';

class FormTest extends TestCase
{
    public function testValidaArquivo()
    {
        $file = [
            'name' => 'teste.doc',
            'type' => 'application/msword',
            'tmp_name' => '/tmp/phpYzdqkD',
            'error' => 0,
            'size' => 1048576
        ];

        $fileValidator = new FileValidator(); 

        $this->assertNull($fileValidator->validate($file), "Arquivo válido não passou na validação.");

        
        $file['name'] = 'teste.txt';
        $this->assertEquals("Extensão de arquivo não permitida.", $fileValidator->validate($file), "Arquivo com extensão inválida passou na validação.");

        
        $file['name'] = 'teste.pdf';
        $file['size'] = 2097152;
        $this->assertEquals("O arquivo excede o tamanho máximo permitido de 1MB.", $fileValidator->validate($file), "Arquivo com tamanho excedido passou na validação.");
    }
}
?>
