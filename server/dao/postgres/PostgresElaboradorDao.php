<?php

include_once('PostgresUsuarioDao.php');

class PostgresElaboradorDao extends PostgresUsuarioDao
{
    public function buscarTodos(){
        $elaboradores = array();

        $query = "SELECT
                    id, login, senha, nome, email, instituicao
                FROM
                    " . $this->table_name . 
                    " WHERE tipo = 'E' ORDER BY id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $elaboradores[] = new Elaborador($id,$login,$senha,$nome,$email,$instituicao);
        }
        
        return $elaboradores;
    }

    public function inserir($elaborador){
        $query = "INSERT INTO " . $this->table_name .
            " (login, senha, nome, email, instituicao, tipo) VALUES" .
            " (:login, :senha, :nome, :email, :instituicao, 'E')";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":login", $elaborador->getLogin());
        $stmt->bindParam(":senha", $elaborador->getSenha());
        $stmt->bindParam(":nome", $elaborador->getNome());
        $stmt->bindParam(":email", $elaborador->getEmail());
        $stmt->bindParam(":instituicao", $elaborador->getInstituicao());

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }

    public function alterar($elaborador)
    {
        $query = "UPDATE " . $this->table_name .
            " SET login = :login, senha = :senha, nome = :nome, email = :email, instituicao = :instituicao" .
            " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":login", $elaborador->getLogin());
        $stmt->bindParam(":senha", $elaborador->getSenha());
        $stmt->bindParam(":nome", $elaborador->getNome());
        $stmt->bindParam(':id', $elaborador->getId());
        $stmt->bindParam(":email", $elaborador->getEmail());
        $stmt->bindParam(":instituicao", $elaborador->getInstituicao());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function buscarPorNomeEmail($pesquisa){
        $pesquisa = "'%" . $pesquisa . "%'";
        $elaboradores = array();

        $query = "SELECT
                    id, login, senha, nome, email, instituicao
                FROM
                    " . $this->table_name . 
                    " WHERE tipo = 'E' AND " .
                    "(nome LIKE " . $pesquisa . " OR email LIKE " . $pesquisa . ")  ORDER BY id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $elaboradores[] = new Elaborador($id,$login,$senha,$nome,$email,$instituicao);
        }
        
        return $elaboradores;
    }
}
?>