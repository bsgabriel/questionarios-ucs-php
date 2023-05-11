<?php
class Oferta
{
  private $id;
  private $dataOferta;
  private $questionario;
  private $respondente;

  public function __construct($id, $dataOferta, $questionario, $respondente)
  {
    $this->id = $id;
    $this->dataOferta = $dataOferta;
    $this->questionario = $questionario;
    $this->respondente = $respondente;
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

  public function getDataOferta()
  {
    return $this->dataOferta;
  }

  public function setDataOferta($dataOferta)
  {
    $this->dataOferta = $dataOferta;

    return $this;
  }

  public function getQuestionario()
  {
    return $this->questionario;
  }

  public function setQuestionario($questionario)
  {
    $this->questionario = $questionario;

    return $this;
  }

  public function getRespondente()
  {
    return $this->respondente;
  }

  public function setRespondente($respondente)
  {
    $this->respondente = $respondente;

    return $this;
  }
}

?>