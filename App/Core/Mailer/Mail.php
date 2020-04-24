<?php

namespace myApp\Core\Mailer;

use myApp\Interfaces\MailerInterface;

class Mail implements MailerInterface
{
    public  function sendEmail(string $email,string $subject,string $message):void
    {
        $msg = $message;
        $msg = wordwrap($msg, 70);
        mail($email, $subject, $msg);
    }
}