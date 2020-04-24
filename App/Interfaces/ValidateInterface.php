<?php


namespace myApp\Interfaces;


interface ValidateInterface
{
    public static function validate(string $password):bool;
}