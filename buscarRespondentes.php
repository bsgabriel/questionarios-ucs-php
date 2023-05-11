<?php
include_once("fachada.php");
$respondentes = $factory->getRespondenteDao()->buscarTodos();

$list = array();
foreach ($respondentes as $respondente) {
 $list[] = array(
  "id" => $respondente->getId(),
  "nome" => $respondente->getNome(),
  "login" => $respondente->getLogin(),
  "senha" => $respondente->getSenha(),
  "email" => $respondente->getEmail(),
  "telefone" => $respondente->getTelefone(),
  "tipo" => $respondente->getTipo()
 );
}
echo json_encode($list);
?>