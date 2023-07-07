<?php

include_once("C:/wamp64/www/questionarios/controller/GlobalKeys.php");
include_once(GlobalKeys::RAIZ."controller/dao/DAO.php");
include_once(GlobalKeys::RAIZ."controller/dao/SubmissaoDAO.php");
include_once(GlobalKeys::RAIZ."controller/entidades/Submissao.php");

class PostgresSubmissaoDao extends DAO implements SubmissaoDao
{
    protected $table_name = 'submissoes';
    
    public function inserir($submissao)
    {
        $query = "INSERT INTO " . $this->table_name .
        " (nome_ocasiao, descricao, data_submissao, id_oferta) VALUES" .
        " (:nome_ocasiao, :descricao, :data_submissao, :id_oferta)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome_ocasiao", $submissao->getNome_ocasiao());
        $stmt->bindParam(":descricao", $submissao->getDescricao());
        $stmt->bindParam(":data_submissao", $submissao->getData_submissao());
        $stmt->bindParam(":id_oferta", $submissao->getId_oferta());

        if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return -1;
        }
    }

    public function alterar($submissao)
    {
        $query = "UPDATE " . $this->table_name .
            " SET nome_ocasiao = :nome_ocasiao, descricao = :descricao, data_submissao = :data_submissao, id_oferta = :id_oferta" .
            " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome_ocasiao", $submissao->getNome_ocasiao());
        $stmt->bindParam(":descricao", $submissao->getDescricao());
        $stmt->bindParam(":data_submissao", $submissao->getData_submissao());
        $stmt->bindParam(":id_oferta", $submissao->getId_oferta());
        $stmt->bindParam(':id', $submissao->getId());
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function remover($submissao)
    {
        $query = "DELETE FROM " . $this->table_name .
            " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $submissao->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function buscarPorId($id)
    {
        $query = "SELECT 
                    s.id, s.nome_ocasiao, s.descricao, s.data_submissao, s.id_oferta
                FROM
                    " . $this->table_name . " AS s             
                WHERE
                    s.id = ?
                LIMIT
                    1 OFFSET 0";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $submissao = null;

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $submissao = new Submissao($row['id'], $row['nome_ocasiao'], $row['descricao'], $row['data_submissao'], $row['id_oferta']);
        }

        return $submissao;
    }

    public function buscarPorOferta($id_oferta)
    {
        $query = "SELECT 
                    s.id, s.nome_ocasiao, s.descricao, s.data_submissao, s.id_oferta
                FROM
                    " . $this->table_name . " AS s             
                WHERE
                    s.id_oferta = ?
                LIMIT
                    1 OFFSET 0";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id_oferta);
        $stmt->execute();

        $submissao = null;

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $submissao = new Submissao($row['id'], $row['nome_ocasiao'], $row['descricao'], $row['data_submissao'], $row['id_oferta']);
        }

        return $submissao;
    }
}
?>