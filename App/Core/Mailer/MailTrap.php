<?php

namespace myApp\Core\Mailer;
use myApp\Interfaces\MailerInterface;

class MailTrap implements MailerInterface
{
    public function sendEmail(string $email,string $subject,string $message): void
    {

    }
}