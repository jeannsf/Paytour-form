<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender {
    private $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer(true);

        $this->configureMailer();
    }

    private function configureMailer() {
        try {
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $_ENV['EMAIL'];
            $this->mailer->Password = $_ENV['EMAIL_PASSWORD'];
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = 587;
            $this->mailer->setFrom('no-reply@example.com', 'Envio de Currículos');
        } catch (Exception $e) {
            throw new Exception("Erro ao configurar o PHPMailer: {$e->getMessage()}");
        }
    }

    public function enviarEmail($emailDestino, $nome, $email, $telefone, $cargo_desejado, $escolaridade, $data_envio) {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($emailDestino);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Currículo Recebido';
            $this->mailer->Body = $this->generateEmailBody($nome, $email, $telefone, $cargo_desejado, $escolaridade, $data_envio);

            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return "Erro ao enviar e-mail: {$this->mailer->ErrorInfo}";
        }
    }

    private function generateEmailBody($nome, $email, $telefone, $cargo_desejado, $escolaridade, $data_envio) {
        return "Olá $nome,<br>Recebemos seu currículo com sucesso.<br><br>
                Detalhes:<br>
                Nome: $nome<br>
                E-mail: $email<br>
                Telefone: $telefone<br>
                Cargo Desejado: $cargo_desejado<br>
                Escolaridade: $escolaridade<br>
                Data e Hora do Envio: $data_envio<br><br>
                Att,<br>
                Equipe Paytour";
    }
}
?>
