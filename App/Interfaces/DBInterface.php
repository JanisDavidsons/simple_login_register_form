<?php
namespace myApp\Interfaces;

interface DBInterface
{
    public static function getInstance(): self;
    public function storeUser(string $name,string $mail,string $password):void ;
    public function loadUser(string $name, string $password):array;
}