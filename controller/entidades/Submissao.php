<?php
class Submissao
{
  private $id;
  private $nome_ocasiao;
  private $descricao;
  private $data_submissao;
  private $id_oferta;

  private function __construct($id, $nome_ocasiao, $descricao, $data_submissao, $id_oferta)
  {
    $this->id = $id;
    $this->nome_ocasiao = $nome_ocasiao;
    $this->descricao = $descricao;
    $this->data_submissao = $data_submissao;
    $this->id_oferta = $id_oferta;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function getNome_ocasiao()
  {
    return $this->nome_ocasiao;
  }

  public function setNome_ocasiao($nome_ocasiao)
  {
    $this->nome_ocasiao = $nome_ocasiao;

    return $this;
  }
 
  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;

    return $this;
  }

  public function getData_submissao()
  {
    return $this->data_submissao;
  }

  public function setData_submissao($data_submissao)
  {
    $this->data_submissao = $data_submissao;

    return $this;
  }
 
  public function getId_oferta()
  {
    return $this->id_oferta;
  }

  public function setId_oferta($id_oferta)
  {
    $this->id_oferta = $id_oferta;

    return $this;
  }
}

?>