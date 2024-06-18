<?php

require __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function enviarEmail($emailDestino, $nome, $email, $telefone, $cargo_desejado, $escolaridade, $data_envio) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('no-reply@example.com', 'Envio de Currículos');
        $mail->addAddress($emailDestino);

        $mail->isHTML(true);
        $mail->Subject = 'Currículo Recebido';
        $mail->Body = "Olá $nome,<br>Recebemos seu currículo com sucesso.<br><br>Detalhes:<br>Nome: $nome<br>E-mail: $email<br>Telefone: $telefone<br>Cargo Desejado: $cargo_desejado<br>Escolaridade: $escolaridade<br>Data e Hora do Envio: $data_envio<br><br>Att,<br>Equipe Paytour";

        $mail->send();
        return true; 
    } catch (Exception $e) {
        return "Erro ao enviar e-mail: {$mail->ErrorInfo}";
    }
}
?> 