<?php

namespace Src\Database;

use Dotenv\Dotenv;

class Connection {
    
    private static $pdo;

    public static function getDatabaseConnection()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
        
        if (!isset(self::$pdo)) {            

            $host = $_ENV['DB_HOST'];
            $port = $_ENV['DB_PORT'];
            $dbname = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASS'];

            try {
                self::$pdo = new \PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);                
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\Exception $ex) {
                echo 'Erro: ' . $ex->getMessage();
            }
        }

        return self::$pdo;
    }
}