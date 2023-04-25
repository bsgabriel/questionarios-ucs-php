<?php

include_once('UsuarioDao.php');
include_once('dao/DAO.php');
include_once('../model/Elaborador.php');
include_once('../model/Respondente.php');

abstract class PostgresUsuarioDao extends DAO implements UsuarioDao
{
    protected $table_name = 'usuarios';

    public abstract function buscarTodos();

    public abstract function inserir($usuario);

    public abstract function alterar($usuario);

    public function removerPorId($id)
    {
        $query = "DELETE FROM " . $this->table_name .
            " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function remover($usuario)
    {
        return $this->removerPorId($usuario->getId());
    }

    public function buscarPorId($id)
    {

        $usuario = null;

        $query = "SELECT
                    id, login, nome, senha, email, instituicao, telefone, tipo
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    1 OFFSET 0";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            if ($row['tipo'] == 'E') {
                $usuario = new Elaborador($row['id'], $row['login'], $row['senha'], $row['nome'], $row['email'], $row['instituicao']);
            } else if ($row['tipo'] == 'R') {
                $usuario = new Respondente($row['id'], $row['login'], $row['senha'], $row['nome'], $row['email'], $row['telefone']);
            }
        }

        return $usuario;
    }

    public function buscarPorLogin($login)
    {

        $usuario = null;

        $query = "SELECT
                    id, login, nome, senha, email, instituicao, telefone, tipo
                FROM
                    " . $this->table_name . "
                WHERE
                    login = ?
                LIMIT
                    1 OFFSET 0";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $login);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['tipo'] == 'E') {
            $usuario = new Elaborador($row['id'], $row['login'], $row['senha'], $row['nome'], $row['email'], $row['instituicao']);
        } else if ($row['tipo'] == 'R') {
            $usuario = new Respondente($row['id'], $row['login'], $row['senha'], $row['nome'], $row['email'], $row['telefone']);
        }

        return $usuario;
    }
}
?>