<?php
class QuestionarioQuestao
{
 private $id;
 private $pontos;
 private $ordem;
 private $id_questionario;
 private $id_questao;

 public function __construct($id, $pontos, $ordem, $id_questionario, $id_questao)
 {
  $this->id = $id;
  $this->pontos = $pontos;
  $this->ordem = $ordem;
  $this->id_questionario = $id_questionario;
  $this->id_questao = $id_questao;
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

 public function getPontos()
 {
  return $this->pontos;
 }

 public function setPontos($pontos)
 {
  $this->pontos = $pontos;

  return $this;
 }

 public function getOrdem()
 {
  return $this->ordem;
 }

 public function setOrdem($ordem)
 {
  $this->ordem = $ordem;

  return $this;
 }

 public function getId_questionario()
 {
  return $this->id_questionario;
 }

 public function setId_questionario($id_questionario)
 {
  $this->id_questionario = $id_questionario;

  return $this;
 }

 public function getId_questao()
 {
  return $this->id_questao;
 }

 public function setId_questao($id_questao)
 {
  $this->id_questao = $id_questao;

  return $this;
 }
}

?>