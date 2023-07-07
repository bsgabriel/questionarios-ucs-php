<?php
class Resposta
{
  private $id;
  private $texto;
  private $avaliacao;
  private $verdadeiro_falso;
  private $questao;
  private $submissao;
  private $alternativa;

  private function __construct($id, $texto, $avaliacao, $verdadeiro_falso, $questao, $submissao, $alternativa = null)
  {
    $this->id = $id;
    $this->texto = $texto;
    $this->avaliacao = $avaliacao;
    $this->verdadeiro_falso = $verdadeiro_falso;
    $this->questao = $questao;
    $this->submissao = $submissao;
    $this->alternativa = $alternativa;
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
 
  public function getTexto()
  {
    return $this->texto;
  }

  public function setTexto($texto)
  {
    $this->texto = $texto;

    return $this;
  }

  public function getAvaliacao()
  {
    return $this->avaliacao;
  }

  public function setAvaliacao($avaliacao)
  {
    $this->avaliacao = $avaliacao;

    return $this;
  }

  public function getVerdadeiro_falso()
  {
    return $this->verdadeiro_falso;
  }
 
  public function setVerdadeiro_falso($verdadeiro_falso)
  {
    $this->verdadeiro_falso = $verdadeiro_falso;

    return $this;
  }

  public function getQuestao()
  {
    return $this->questao;
  }

  public function setQuestao($questao)
  {
    $this->questao = $questao;

    return $this;
  }

  public function getSubmissao()
  {
    return $this->submissao;
  }

  public function setSubmissao($submissao)
  {
    $this->submissao = $submissao;

    return $this;
  }

  public function getAlternativa()
  {
    return $this->alternativa;
  }

  public function setAlternativa($alternativa)
  {
    $this->alternativa = $alternativa;

    return $this;
  }
}

?>