<?php

// 200 = OK
// 404 = Not Found
// 405 = Method Not Allowed

include_once('../fachada.php');

$daoUsuario = $factory->getUsuarioDao();
$daoOferta = $factory->getOfertaDao();

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
   case 'GET':
      if (!empty($_GET["id"])) {
         // Verifique o token de acesso no cabeçalho da solicitação
         $authorizationHeader = $_SERVER['HTTP_AUTHORIZATION'];

         if ($authorizationHeader && strpos($authorizationHeader, 'Bearer ') === 0) {
            $accessToken = substr($authorizationHeader, 7);

            // Valide o token de acesso
            if (isAccessTokenValid($accessToken)) {
               $id = intval($_GET["id"]);

               $usuario = $daoUsuario->buscarPorId($id);
               if (is_null($usuario)) {
                  http_response_code(404);
               } else {
                  $usuarioJSON = $usuario->toJson();
                  $resultados = $daoOferta->buscarResultadosPorRespondente($id);

                  $resultadosJSON = array();
                  foreach ($resultados as $resultado) {
                     $resultadosJSON[] = $resultado->toJson();
                  }

                  echo '{ "usuario" : ' . $usuarioJSON . ', "questionarios" : ' . $resultadosJSON . '}';
                  http_response_code(200);
               }
            } else {
               // Token de acesso inválido
               http_response_code(401);
               echo 'TOKEN DE ACESSO INVÁLIDO';
            }
         } else {
            // Nenhum token de acesso fornecido
            http_response_code(401);
            echo 'INFORME UM TOKEN DE ACESSO';
         }
      } else {
         $usuarios = $daoUsuario->buscarRespondentes();

         $usuariosJson = array();
         foreach ($usuarios as $usuario) {
            $usuariosJson[] = $usuario->toJson();
         }
         echo $usuariosJson;
         http_response_code(200);
      }
      break;
   default:
      http_response_code(405);
      break;
}

function isAccessTokenValid($accessToken)
{
   $validAccessToken = "189ZCHA897YCKC";

   return $accessToken === $validAccessToken;
}

?>