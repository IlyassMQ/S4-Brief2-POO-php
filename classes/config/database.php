<?php

class Database
{
    protected string $host = 'localhost';
    protected string $db   = 'unitycare_poo_db';
    protected string $user = 'root';
    protected string $pass = '';
    protected ?PDO $conn = null;

    public function connect(): PDO
    {
        if ($this->conn === null) {
            $dsn = "mysql:host={$this->host};dbname={$this->db};";
            $this->conn = new PDO($dsn, $this->user, $this->pass);

        }
        return $this->conn;
    }
}



