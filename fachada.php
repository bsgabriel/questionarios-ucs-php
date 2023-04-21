<?php
error_reporting(E_ERROR | E_PARSE);

include_once('model/Elaborador.php');
echo "<p>incluiu Elaborador.php</p>";

include_once('model/Respondente.php');
echo "<p>incluiu Respondente.php</p>";

include_once('dao/UsuarioDAO.php');
echo "<p>incluiu UsuarioDAO.php</p>";

include_once('dao/postgres/PostgresElaboradorDao.php');
echo "<p>incluiu PostgresElaboradorDao.php</p>";

include_once('dao/DaoFactory.php');
echo "<p>incluiu DaoFactory.php</p>";

include_once('dao/postgres/PostgresDaoFactory.php');
echo "<p>incluiu PostgresDaoFactory.php</p>";

$factory = new PostgresDaoFactory();
?>