<?php

namespace myApp\Core\Mailer;

use myApp\Interfaces\MailerInterface;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class Gmail_SMTP implements MailerInterface
{
    public function sendEmail(string $email,string $subject,string $message): void
    {
        $config = require 'App/Config/GmailSmtpConfig.php';

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = $config['mailer'];

        $mail->SMTPDebug = $config['debug'];
        $mail->SMTPAuth = $config['smtpAuth'];
        $mail->SMTPSecure = $config['smtpSecure'];
        $mail->Port = $config['port'];
        $mail->Host = $config['host'];
        $mail->Username = $config['username'];
        $mail->Password = $config['password'];
        $mail->IsHTML($config['isHtml']);

        try {
            $mail->AddAddress("janis.davidsons@gmail.com", "Janis");
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        try {
            $mail->SetFrom("janis.davidsons@gmail.com", "JD");
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        try {
            $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        try {
            $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        $mail->Subject = "Janis Davidsons homeWork";
        $content = "<b>$message</b>";

        $mail->MsgHTML($content);


        if (!$mail->Send()) {
            echo "Error while sending Email.";
            var_dump($mail);
        } else {
            echo "Email sent successfully";
        }
    }
}