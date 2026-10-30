<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');

$dotenv->load();

class Conexion
{
    public function conectar()
    {
        $usuario = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $host = $_ENV['DB_HOST'];
        $db = $_ENV['DB_NAME'];

        $conexion = new PDO(
            "mysql:host=$host; dbname=$db; charset=utf8mb4",
            $usuario,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
        return $conexion;
    }
}
