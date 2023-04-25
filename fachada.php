<?php
error_reporting(E_ERROR | E_PARSE);
include_once('model/Elaborador.php');
include_once('model/Respondente.php');
include_once('dao/UsuarioDAO.php');
include_once('dao/postgres/PostgresElaboradorDao.php');
include_once('dao/postgres/PostgresRespondenteDao.php');
include_once('dao/DaoFactory.php');
include_once('dao/postgres/PostgresDaoFactory.php');
$factory = new PostgresDaoFactory();
?>