<?php
include_once "fachada.php";
$idUsuario = isset($_GET["idUsuario"]) ? addslashes(trim($_GET["idUsuario"])) : FALSE;

if (!$idUsuario) {
 $response = array(
  "status" => "error",
  "message" => "ID de usuário não informado",
 );
 echo json_encode($response);
 exit;
}

/* BUSCA DE USUÁRIO */
$usuario = null;
try {
 $usuario = $factory->getUsuarioDao()->buscarPorId($idUsuario);
} catch (\Throwable $th) {
 $response = array(
  "status" => "error",
  "message" => "Não foi possível buscar informações do usuário",
  "errorMessage" => $th->getMessage(),
  "stackTrace" => $th->getTraceAsString()
 );
 echo json_encode($response);
 exit;
}

if (is_null($usuario)) {
 $response = array(
  "status" => "error",
  "message" => "Nenhum usuário encontrado para o ID informado",
 );
 echo json_encode($response);
 exit;
}

/* BUSCA DE OFERTAS */
$ofertas = null;
try {
 $ofertas = $factory->getOfertaDao()->buscarOfertasPorRespondente($usuario);
} catch (\Throwable $th) {
 $response = array(
  "status" => "error",
  "message" => "Não foi possível buscar ofertas",
  "errorMessage" => $th->getMessage(),
  "stackTrace" => $th->getTraceAsString()
 );
 echo json_encode($response);
 exit;
}

if (is_null($ofertas) || empty($ofertas)) {
 $response = array(
  "status" => "error",
  "message" => "Nenhuma oferta encontrada",
 );
 echo json_encode($response);
 exit;
}

 $arrOfertas = array();
 foreach ($ofertas as $oferta) {
  $arrOfertas[] = $oferta->toJSon();
 }
 echo json_encode($arrOfertas);


?>