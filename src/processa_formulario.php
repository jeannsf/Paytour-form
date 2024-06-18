<?php
require __DIR__ . '/../vendor/autoload.php'; 
require './config/database.php';
require './validarArquivo.php';
require './enviar_email.php';



$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cargo_desejado = $_POST['cargo_desejado'];
$escolaridade = $_POST['escolaridade'];
$observacoes = $_POST['observacoes'];
$data_envio = date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$arquivo = $_FILES['arquivo'];


$erroArquivo = validaArquivo($arquivo);
if ($erroArquivo) {
    die($erroArquivo);
}


$uploadDir = 'uploads/';
$uploadFile = $uploadDir . basename($arquivo['name']);

if (!move_uploaded_file($arquivo['tmp_name'], $uploadFile)) {
    die("Erro ao fazer upload do arquivo.");
}


$sql = "INSERT INTO curriculos (nome, email, telefone, cargo_desejado, escolaridade, observacoes, arquivo, data_envio, ip)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $nome, $email, $telefone, $cargo_desejado, $escolaridade, $observacoes, $uploadFile, $data_envio, $ip);

if ($stmt->execute() === TRUE) {
    header('Location: ../public/obrigado.php');
    exit();
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
