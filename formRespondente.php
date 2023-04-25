<?php
$titulo_pagina = "Cadastro de respondente";

include_once "fachada.php";

$codRespondente = @$_GET["codRespondente"]; // TODO: usar quando for feito edição de elaborador
$respondente;
$txtBtnSalvar;
if ($codRespondente) {
  $respondente = $factory->getRespondenteDao()->buscarPorId($codRespondente);
  $txtBtnSalvar = "Salvar";
} else {
  $respondente = new Respondente(null, null, null, null, null, null);
  $txtBtnSalvar = "Cadastrar";
}

include_once "cabecalho.php";

echo "<div class='container mt-5'>";
echo "<h1>$titulo_pagina</h1>";

if ($codRespondente)
  echo "<form action='salvarUsuario.php?tipoUsuario=R&codUsuario={$codRespondente}' method='POST'>";
else
  echo "<form action='salvarUsuario.php?tipoUsuario=R' method='POST'>";

echo "<div class='form-group'>";
echo "<label for='login'>Login:</label>";
echo "<input type='text' class='form-control' id='login' name='login' required value='{$respondente->getLogin()}'/>";
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
echo "<input type='text' class='form-control' id='nome' name='nome' required value='{$respondente->getNome()}'/>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='email'>Email:</label>";
echo "<input type='text' class='form-control' id='email' name='email' required value='{$respondente->getEmail()}'/>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='extra'>Telefone:</label>";
echo "<input type='text' class='form-control' id='extra' name='extra' required value='{$respondente->getTelefone()}'/>";
echo "</div>";

echo "<div>";
echo "<button type='submit' class='btn btn-primary'>{$txtBtnSalvar}</button>";
echo "</form>";
echo "</div>"

  ?>

<?php
include_once "rodape.php"
  ?>