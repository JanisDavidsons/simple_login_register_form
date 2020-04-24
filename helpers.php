<?php

use myApp\Core\Database\Database;
use myApp\Core\Mailer\Gmail_SMTP;
use myApp\Core\Validator\Validate;
use myApp\Interfaces\DBInterface;
use myApp\Interfaces\MailerInterface;
use myApp\Interfaces\ValidateInterface;

function mailer(): MailerInterface
{
    return new Gmail_SMTP();
}

function database(): DBInterface
{
    return Database::getInstance();
}

function validator(): ValidateInterface
{
    return new Validate();
}