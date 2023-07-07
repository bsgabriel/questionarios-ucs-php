<?php

include_once(__DIR__.'/PostgresUsuarioDao.php');

class PostgresRespondenteDao extends PostgresUsuarioDao
{

    public function alterar($usuario)
    {
        $query = "UPDATE " . $this->table_name .
            " SET login = :login, senha = :senha, nome = :nome, telefone = :telefone" .
            " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":login", $usuario->getLogin());
        $stmt->bindParam(":senha", $usuario->getSenha());
        $stmt->bindParam(":nome", $usuario->getNome());
        $stmt->bindParam(":telefone", $usuario->getTelefone());
        $stmt->bindParam(':id', $usuario->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function buscarTodos()
    {
        $query = "SELECT
        id, login, senha, nome, email, telefone
    FROM
        " . $this->table_name .
            " WHERE TIPO = 'R' ORDER BY id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $respondentes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $respondentes[] = new Respondente($id, $login, $senha, $nome, $email, $telefone);
        }
        return $respondentes;

    }

    public function inserir($usuario)
    {
        $query = "INSERT INTO " . $this->table_name .
            " (login, senha, nome, email, tipo, telefone) VALUES" .
            " (:login, :senha, :nome, :email, 'R', :telefone)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":login", $usuario->getLogin());
        $stmt->bindParam(":senha", $usuario->getSenha());
        $stmt->bindParam(":nome", $usuario->getNome());
        $stmt->bindParam(":email", $usuario->getEmail());
        $stmt->bindParam(":telefone", $usuario->getTelefone());
        $stmt->execute();
    }
}
?>