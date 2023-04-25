<?php
$tipoUsuario = $_GET['tipoUsuario'];
$codUsuario = $_GET['codUsuario'];

$login = $_POST['login'];
$senha = $_POST['senha'];
$senhaConfirma = $_POST['senhaConfirma'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$extra = $_POST['extra']; // Pode ser tanto a insituição (elaborador) quanto telefone (respondente)

include_once "fachada.php";

if (strcmp($tipoUsuario, "E") == 0) {
  if ($codUsuario)
    $factory->getElaboradorDao()->alterar(new Elaborador($codUsuario, $login, $senha, $nome, $email, $extra));
  else
    $factory->getElaboradorDao()->inserir(new Elaborador(null, $login, $senha, $nome, $email, $extra));
} else if (strcmp($tipoUsuario, "R") == 0) {
  if ($codUsuario)
    $factory->getRespondenteDao()->alterar(new Respondente($codUsuario, $login, $senha, $nome, $email, $extra));
  else
    $factory->getRespondenteDao()->inserir(new Respondente(null, $login, $senha, $nome, $email, $extra));
}

// header("Location: listaVeiculos.php");
?>