<?php
error_reporting(E_ERROR | E_PARSE);
include_once('model/Elaborador.php');
include_once('model/Respondente.php');
include_once('model/Administrador.php');
include_once('model/Questao.php');
include_once('model/Alternativa.php');
include_once('model/Questionario.php');
include_once('model/QuestionarioQuestao.php');
include_once('dao/UsuarioDAO.php');
include_once('dao/QuestionarioDAO.php');
include_once('dao/QuestionarioQuestaoDAO.php');
include_once('dao/ElaboradorDAO.php');
include_once('dao/RespondenteDAO.php');
include_once('dao/DaoFactory.php');
include_once('dao/postgres/PostgresDaoFactory.php');
$factory = new PostgresDaoFactory();
?>