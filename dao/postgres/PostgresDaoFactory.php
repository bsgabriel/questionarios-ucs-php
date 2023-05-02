<?php
include_once('dao/DaoFactory.php');
include_once('PostgresUsuarioDao.php');

class PostgresDaoFactory extends DaoFactory
{
    private $host = "localhost";
    private $db_name = "questionarios";
    private $port = "5432";
    private $username = "postgres";
    private $password = "postgres";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function getElaboradorDao()
    {
        return new PostgresElaboradorDao($this->getConnection());
    }

    public function getRespondenteDao()
    {
        return new PostgresRespondenteDao($this->getConnection());
    }

    public function getUsuarioDao()
    {
        return new PostgresUsuarioDao($this->getConnection());
    }
}
?>