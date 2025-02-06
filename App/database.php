<?php

class Database{
    private $dsn = "mysql:host=localhost;dbname=ajax-mvc;charset=utf8mb4";
    private $user = "root";
    private $pass = "";

    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                
            ]);

            // echo "connection ok";
            
        } catch (Exception $e) {
            die("erreur de connexion :" . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}

$db = new Database();

