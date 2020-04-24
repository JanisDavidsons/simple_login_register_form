<?php

namespace myApp\Core\Validator;

use myApp\Interfaces\ValidateInterface;

class Validate implements ValidateInterface
{
    public static function validate(string $password): bool
    {
        $uppercase = preg_match('/[A-Z]/', $password);
        $lowercase = preg_match('/[a-z]/', $password);
        $number = preg_match('/[0-9]/', $password);
        $specialChar = preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChar || strlen($_POST['password']) < 6) {
            return false;
        }
        return true;
    }
}