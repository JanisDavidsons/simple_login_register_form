<?php


namespace myApp\Core\Database;

use Medoo\Medoo;
use myApp\Interfaces\DBInterface;

define('CONFIG', require 'App/Config/dataBaseConfig.php');

class Database implements DBInterface
{
    private Medoo $database;
    public static ?Database $instance = null;

    public function __construct(array $config)
    {
        if (is_null(self::$instance)) {
            self::$instance = $this;
        }
        $this->database = new Medoo(CONFIG);
    }

    public static function getInstance(): self
    {
        return self::$instance ?? new Database(CONFIG);
    }

    public function loadUser(string $username, string $password): array
    {
        $query = $this->database->select("users", "*", [
            "AND" => [
                "name" => $username,
                "password" => $password
            ]
        ]);
        return $query !== null ? $query : [];
    }

    public function storeUser(string $name, string $mail, string $password): void
    {
        $this->database->insert("users", [
            "name" => $name,
            "email" => $mail,
            "password" => base64_encode($password)
        ]);
    }

    public function getByEmail(string $mail): array
    {
        $query = $this->database->select("users", "*", [
            "AND" => [
                "email" => $mail,
            ]
        ]);
        return $query !== null ? $query : [];
    }

    public function resetPassword(string $email, string $password)
    {
        $this->database->update("users", [
            "password" => base64_encode($password),

        ], [
            "email[<]" => $email
        ]);
    }
}