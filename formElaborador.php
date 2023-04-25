<?php
$titulo_pagina = "Cadastro de elaborador";

include_once "fachada.php";

$codElaborador = @$_GET["codElaborador"]; // TODO: usar quando for feito edição de elaborador
$elaborador;
$txtBtnSalvar;
if ($codElaborador) {
  $elaborador = $factory->getElaboradorDao()->buscarPorId($codElaborador);
  $txtBtnSalvar = "Salvar";
} else {
  $elaborador = new Elaborador(null, null, null, null, null, null);
  $txtBtnSalvar = "Cadastrar";
}

include_once "cabecalho.php";

echo "<div class='container mt-5'>";
echo "<h1>$titulo_pagina</h1>";

if ($codElaborador)
  echo "<form action='salvarUsuario.php?tipoUsuario=E&codUsuario={$codElaborador}' method='POST'>";
else
  echo "<form action='salvarUsuario.php?tipoUsuario=E' method='POST'>";

echo "<div class='form-group'>";
echo "<label for='login'>Login:</label>";
echo "<input type='text' class='form-control' id='login' name='login' required value='{$elaborador->getLogin()}'/>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='senha'>Senha:</label>";
echo "<input type='text' class='form-control' id='senha' name='senha' required'/>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='senhaConfirma'>Confirmar senha:</label>";
echo "<input type='text' class='form-control' id='senhaConfirma' name='senhaConfirma' required'/>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='nome'>Nome:</label>";
echo "<input type='text' class='form-control' id='nome' name='nome' required value='{$elaborador->getNome()}'/>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='email'>Email:</label>";
echo "<input type='text' class='form-control' id='email' name='email' required value='{$elaborador->getEmail()}'/>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='extra'>Instituicao:</label>";
echo "<input type='text' class='form-control' id='extra' name='extra' required value='{$elaborador->getInstituicao()}'/>";
echo "</div>";

echo "<div>";
echo "<button type='submit' class='btn btn-primary'>{$txtBtnSalvar}</button>";
echo "</form>";
echo "</div>"

  ?>

<?php
include_once "rodape.php"
  ?>