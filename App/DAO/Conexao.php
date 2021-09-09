<?php

namespace App\DAO;

abstract class Conexao
{
    /**
     * @var \PDO
     */
    protected $pdo;
    public function __construct()
    {
        $host = getenv('MYSQL_HOST');
        $port = getenv('MYSQL_PORT');
        $user = getenv('MYSQL_USER');
        $pass = getenv('MYSQL_PASSWORD');
        $db_name = getenv('MYSQL_DBNAME');

        $dsn = "mysql:host={$host};dbname={$db_name};port={$port}";


        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}