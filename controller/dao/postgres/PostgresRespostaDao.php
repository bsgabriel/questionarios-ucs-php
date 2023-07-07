<?php

include_once("C:/wamp64/www/questionarios/controller/GlobalKeys.php");
include_once(GlobalKeys::RAIZ."controller/dao/DAO.php");
include_once(GlobalKeys::RAIZ."controller/dao/RespostaDAO.php");
include_once(GlobalKeys::RAIZ."controller/entidades/Resposta.php");
include_once(GlobalKeys::RAIZ."controller/entidades/Alternativa.php");
include_once(GlobalKeys::RAIZ."controller/entidades/Questao.php");
include_once(GlobalKeys::RAIZ."controller/entidades/Submissao.php");

class PostgresRespostaDao extends DAO implements RespostaDAO
{
    protected $table_name = 'respostas';
    
    public function inserir($resposta)
    {
        $query = "INSERT INTO " . $this->table_name .
        " (texto, avaliacao, verdadeiro_falso, id_questao, id_submissao, id_alternativa) VALUES" .
        " (:texto, :avaliacao, :verdadeiro_falso, :id_questao, :id_submissao, :id_alternativa)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":texto", $resposta->getTexto());
        $stmt->bindParam(":avaliacao", $resposta->getAvaliacao());
        $stmt->bindParam(":verdadeiro_falso", $resposta->getVerdadeiro_falso());
        $stmt->bindParam(":id_questao", $resposta->getQuestao()->getId());
        $stmt->bindParam(":id_submissao", $resposta->getSubmissao()->getId());
        $stmt->bindParam(":id_alternativa", $resposta->getAlternativa()->getId());

        if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return -1;
        }
    }

    public function alterar($resposta)
    {
        $query = "UPDATE " . $this->table_name .
            " SET texto = :texto, avaliacao = :avaliacao, verdadeiro_falso = :verdadeiro_falso, id_questao = :id_questao, ".
            " id_submissao = :id_submissao, id_alternativa = :id_alternativa" .
            " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":texto", $resposta->getTexto());
        $stmt->bindParam(":avaliacao", $resposta->getAvaliacao());
        $stmt->bindParam(":verdadeiro_falso", $resposta->getVerdadeiro_falso());
        $stmt->bindParam(":id_questao", $resposta->getQuestao()->getId());
        $stmt->bindParam(":id_submissao", $resposta->getSubmissao()->getId());
        $stmt->bindParam(":id_alternativa", $resposta->getAlternativa()->getId());
        $stmt->bindParam(':id', $resposta->getId());
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function remover($resposta)
    {
        $query = "DELETE FROM " . $this->table_name .
            " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $resposta->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function buscarPorId($id)
    {
        $query = "SELECT 
                    r.id, r.texto, r.avaliacao, r.verdadeiro_falso AS respostasVF, r.id_questao, r.id_submissao, r.id_alternativa,
                    q.descricao AS descricao_questao, q.tipo, q.imagem, q.verdadeiro_falso AS questoesVF, s.nome_ocasiao, 
                    s.descricao AS descricao_submissao, s.data_submissao, s.id_oferta, a.descricao AS descricao_alternativa, a.correta
                FROM
                    " . $this->table_name . " AS r
                INNER JOIN
                    questoes q ON q.id = r.id_questao
                INNER JOIN
                    submissoes s ON s.id = r.id_submissao
                INNER JOIN
                    alternativas a ON a.id = r.id_alternativa
                WHERE
                    r.id = ?
                LIMIT
                    1 OFFSET 0";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $factory = new PostgresDaofactory();
        $alternativaDAO = $factory->getAlternativaDao();
        $questao = null;

        $alternativas = [];
        $resposta = null;

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $alternativa = new Alternativa($row['id_alternativa'], $row['descricao_alternativa'], $row['correta'], $row['id_questao']);
            $submissao = new Submissao($row['id_submissao'], $row['nome_ocasiao'], $row['descricao_submissao'], $row['data_submissao'], $row['id_oferta']);
            $alternativas = $alternativaDAO->buscarPorQuestao($row['id_questao']); //Busca as alternativas da questão
            $questao = new Questao($row['id_questao'], $row['descricao_questao'], $row['tipo'], $row['imagem'], $alternativas);
            $resposta = new Resposta($row['id'], $row['texto'], $row['avaliacao'], $row['respostasVF'], $questao, $submissao, $alternativa);
        }

        return $resposta;
    }
}
?>