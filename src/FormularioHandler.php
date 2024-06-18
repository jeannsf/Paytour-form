<?php
require __DIR__ . '/../vendor/autoload.php';
require './config/database.php';  
require './EmailSender.php'; 
require './FileValidator.php'; 

use Dotenv\Dotenv;

class FormularioHandler {
    private $conn;
    private $emailSender;
    private $fileValidator;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
        $this->emailSender = new EmailSender();
        $this->fileValidator = new FileValidator();
    }

    public function processForm($postData, $fileData) {
        $nome = $postData['nome'];
        $email = $postData['email'];
        $telefone = $postData['telefone'];
        $cargo_desejado = $postData['cargo_desejado'];
        $escolaridade = $postData['escolaridade'];
        $observacoes = $postData['observacoes'];
        $data_envio = date("Y-m-d H:i:s");
        $ip = $_SERVER['REMOTE_ADDR'];
        $arquivo = $fileData['arquivo'];

        $erroArquivo = $this->fileValidator->validate($arquivo);
        if ($erroArquivo) {
            die($erroArquivo);
        }

        $uploadDir = __DIR__ . "./uploads/$nome + ";
        $uploadFile = $uploadDir . basename($arquivo['name']);

        echo "Caminho de upload: " . $uploadFile . "<br>";

        if (!move_uploaded_file($arquivo['tmp_name'], $uploadFile)) {
            die("Erro ao fazer upload do arquivo.");
        }

        if ($this->insereNoBanco($nome, $email, $telefone, $cargo_desejado, $escolaridade, $observacoes, $uploadFile, $data_envio, $ip)) {
            $this->emailSender->enviarEmail($email, $nome, $email, $telefone, $cargo_desejado, $escolaridade, $data_envio);
            header('Location: ../public/obrigado.php');
            exit();
        } else {
            echo "Erro ao inserir dados no banco.";
        }
    }

    private function insereNoBanco($nome, $email, $telefone, $cargo_desejado, $escolaridade, $observacoes, $uploadFile, $data_envio, $ip) {
        $sql = "INSERT INTO curriculos (nome, email, telefone, cargo_desejado, escolaridade, observacoes, arquivo, data_envio, ip)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssssss", $nome, $email, $telefone, $cargo_desejado, $escolaridade, $observacoes, $uploadFile, $data_envio, $ip);

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}

$database = new Database();
$formHandler = new FormularioHandler($database->getConnection());
$formHandler->processForm($_POST, $_FILES);

$database->closeConnection();
?>
