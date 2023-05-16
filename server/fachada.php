<?php
error_reporting(E_ERROR | E_PARSE);
include_once(__DIR__ . '/model/Elaborador.php');
include_once(__DIR__ . '/model/Respondente.php');
include_once(__DIR__ . '/model/Administrador.php');
include_once(__DIR__ . '/model/Questao.php');
include_once(__DIR__ . '/model/Alternativa.php');
include_once(__DIR__ . '/model/Questionario.php');
include_once(__DIR__ . '/model/QuestionarioQuestao.php');
include_once(__DIR__ . '/model/Oferta.php');
include_once(__DIR__ . '/dao/UsuarioDAO.php');
include_once(__DIR__ . '/dao/QuestionarioDAO.php');
include_once(__DIR__ . '/dao/QuestionarioQuestaoDAO.php');
include_once(__DIR__ . '/dao/ElaboradorDAO.php');
include_once(__DIR__ . '/dao/RespondenteDAO.php');
include_once(__DIR__ . '/dao/DaoFactory.php');
include_once(__DIR__ . '/dao/OfertaDAO.php');
include_once(__DIR__ . '/dao/postgres/PostgresDaoFactory.php');
$factory = new PostgresDaoFactory();
?>