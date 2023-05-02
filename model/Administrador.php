<?php

include_once("Usuario.php");
class Administrador extends Usuario
{
  public function __construct($id, $login, $senha, $nome, $email)
  {
    parent::__construct($id, $login, $senha, $nome, $email, 'A');
  }
}

?>