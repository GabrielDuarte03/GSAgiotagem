<?php

//Load Composer's autoloader
require '../PHPMailer/PHPMailerAutoload.php';
 
//Create an instance; passing `true` enables exceptions
$mailer = new PHPMailer(true);


    $nome = $_POST['nome'];
    $assunto = $_POST['assunto'];
    $from = $_POST['email'];
    $msg = $_POST['msg'];
    $assunto = sprintf('=?%s?%s?%s?=', 'UTF-8', 'Q', quoted_printable_encode($assunto));

try {
    //Server settings
        
$mailer->IsSMTP();
$mailer->Host='smtp.gmail.com';
$mailer->Charset = 'UTF-8';
$mailer->SMTPAuth = true;

$mailer->Username='salermitogabrielito@gmail.com';
$mailer->Password='salermo123';
$mailer->SMTPSecure = 'ssl';
$mailer->Port = 465;

$mailer->setFrom($from, 'Contato');
$mailer->SingleTo = true;

$mailer->addAddress("gabrielmiguel656@gmail.com");
$mailer->Subject = $assunto;
$mailer->Body = "Olá, meu nome é " . $nome . ". " . $msg;

    $mailer->send();
    echo 'Message has been sent';

    header("Location: ../email.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mailer->ErrorInfo}";
}

?>