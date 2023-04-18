<?php

include_once("Usuario.php");

class Elaborador extends Usuario
{
  private $instituicao;

  public function __construct($id, $login, $senha, $nome, $email, $instituicao)
  {
    parent::__construct($id, $login, $senha, $nome, $email, 'E');
    $this->instituicao = $instituicao;
  }

  public function getInstituicao()
  {
    return $this->instituicao;
  }

  public function setInstituicao($instituicao)
  {
    $this->instituicao = $instituicao;
  }

}

?>