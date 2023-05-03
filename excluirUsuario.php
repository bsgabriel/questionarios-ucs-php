<?php 
 include_once("fachada.php");
 $factory->getUsuarioDao()->removerPorId($_GET["id"]);
 header("elaboradores.html");
?>