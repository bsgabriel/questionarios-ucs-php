<?php
include_once("../entidades/Usuario.php");
interface UsuarioDao
{
  public function inserir($usuario);
  public function remover($id);
  public function alterar($usuario);
  public function buscarPorId($id);
  public function buscarPorLogin($login);
  public function buscarPorNomeEmail($pesquisa, $tipoUsuario);
  public function buscarTodos();
  public function buscarElaboradores();
  public function buscarRespondentes();
}
?>
