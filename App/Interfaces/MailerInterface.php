<?php

namespace myApp\Interfaces;

interface MailerInterface
{
    public function sendEmail(string $email,string $subject,string $message):void;
}