<?php

namespace myApp\Controllers;

use myApp\Core\View;

class RegisterController
{
    public function register(array $params)
    {
        View::show('register.php');
    }

    public function store()
    {
        if (!validator()->validate($_POST['password'])) {
            View::show('register.php', ['Your password is too weak, try again!']);
            return;
        }

        database()->storeUser($_POST['username'], $_POST['email'], $_POST['password']);

        mailer()->sendEmail(
            $_POST['email'],
            'Registration successful!',
            $_POST['username'] . ', thank you for registering in Janis Davidsons Website!');

        header('Location: /emailSent');
    }

    public function emailSent()
    {
        View::show('login.php',['Thank you for registering in Janis Davidsons Website!']);
    }
}
