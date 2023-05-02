<?php

/**
 * Classe criada para armazenar valores constantes, para acessar valores de sessão ou cookies.
 * @todo trocar o nome delas por algo que não seja fácil de identificar ao acessar os cookies.
 */
class GlobalKeys
{
 /** 
  * Chave que armazena o tipo de usuário autenticado
  */
 const TIPO_USUARIO_AUTENTICADO = "TIPO_USUARIO_AUTENTICADO";

  /** 
  * Chave que armazena o ID do usuário autenticado
  */
  const ID_USUARIO_AUTENTICADO = "ID_USUARIO_AUTENTICADO";
}
?>