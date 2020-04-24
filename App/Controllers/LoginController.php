<?php

namespace myApp\Controllers;

use myApp\Core\Database\Database;
use myApp\Core\View;

class LoginController
{
    public function login()
    {
        if (!empty($_SESSION)) {
            $this->loadUser();
            return;
        }
        View::show('login.php');
    }

    public function loadUser()
    {
        if (empty($_SESSION)) {
            $_SESSION = [
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ];
        }
        $userData = Database::getInstance()->loadUser($_SESSION['username'], base64_encode($_SESSION['password']));

        !empty($userData) ? View::show('loggedIn.php', $userData) : header('Location: /');
    }

    public function logOut()
    {
        session_destroy();
        View::show('login.php');
    }
}