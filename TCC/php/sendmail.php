<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['btnSend'])) {
    $msg = '';

    // Campos do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $assunto = $_POST['assunto'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';

    // Valida se os campos não estão vazios
    if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($assunto) && !empty($mensagem)) {
        
        $mail = new PHPMailer(true);
        try {
            // Configurações do servidor
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'your-email@gmail.com'; // Substitua pelo seu email
            $mail->Password   = 'your-password'; // Substitua pela sua senha
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Remetente e destinatário
            $mail->setFrom('your-email@gmail.com', 'Seu Nome'); // Substitua pelo seu email e nome
            $mail->addAddress($email);

            // Conteúdo do email
            $mail->isHTML(true);
            $mail->Subject = 'Envio Teste do Formulário de Contato';
            $mail->Body    = "FORMULÁRIO DE CONTATO<br>"
                            . "<b>De:</b> " . $nome . "<br>"
                            . "<b>Email:</b> " . $email . "<br>"
                            . "<b>Telefone:</b> " . $telefone . "<br>"
                            . "<b>Assunto:</b> " . $assunto . "<br>"
                            . "<b>Mensagem:</b> " . $mensagem . "<br><br>"
                            . "<hr>"
                            . "Mensagem enviada do formulário de contato da demonstração de formulário de contato com PHP.";

            $mail->send();
            $msg = '<div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Mensagem enviada com sucesso!</strong>
                    </div>';
        } catch (Exception $e) {
            $msg = '<div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Erro ao enviar mensagem, tente novamente!</strong>
                    </div>';
        }
    } else {
        // Mostra mensagem de erro caso algum dos campos esteja vazio
        $msg = '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Preencha todos os campos!!</strong>
                </div>';
    }
}
?>
