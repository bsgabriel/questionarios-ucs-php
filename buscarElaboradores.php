<?php
include_once("fachada.php");
$elaboradores = $factory->getElaboradorDao()->buscarTodos();

$list = array();
foreach ($elaboradores as $elaborador) {
 $list[] = array(
  "id" => $elaborador->getId(),
  "nome" => $elaborador->getNome(),
  "login" => $elaborador->getLogin(),
  "senha" => $elaborador->getSenha(),
  "email" => $elaborador->getEmail(),
  "instituicao" => $elaborador->getInstituicao(),
  "tipo" => $elaborador->getTipo()
 );
}
echo json_encode($list);
?>