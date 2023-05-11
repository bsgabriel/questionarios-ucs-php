<?php
include_once('dao/DaoFactory.php');
include_once('PostgresUsuarioDao.php');
include_once('PostgresAlternativaDao.php');
include_once('PostgresQuestaoDao.php');
include_once('PostgresElaboradorDao.php');
include_once('PostgresRespondenteDao.php');
include_once('PostgresQuestionarioDao.php');
include_once('PostgresQuestionarioQuestaoDao.php');

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

    public function getQuestaoDao()
    {
        return new PostgresQuestaoDao($this->getConnection());
    }

    public function getAlternativaDao()
    {
        return new PostgresAlternativaDao($this->getConnection());
    }

    public function getQuestionarioQuestaoDao()
    {
        return new PostgresQuestionarioQuestaoDao($this->getConnection());
    }

    public function getQuestionarioDao()
    {
        return new PostgresQuestionarioDao($this->getConnection());
    }
}
?>