<?php
include_once "fachada.php";

$tipoUsuario = @$_GET["tipoUsuario"];
$codUsuario = @$_GET["codUsuario"]; // TODO: usar quando for feito edição de elaborador
$usuario;
$txtBtnSalvar;
if ($codUsuario) {
  if (strcmp($tipoUsuario, "E") == 0)
    $usuario = $factory->getElaboradorDao()->buscarPorId($codUsuario);
  else if (strcmp($tipoUsuario, "R") == 0)
    $usuario = $factory->getRespondenteDao()->buscarPorId($codUsuario);

  $txtBtnSalvar = "Salvar";
  // $titulo_pagina = "Alteração de " . strcmp($tipoUsuario, "E") == 0 ? "elaborador" : "respondente";
  $titulo_pagina = "Alteração de usuário";
} else {
  if ($tipoUsuario == 'E')
    $usuario = new Elaborador(null, null, null, null, null, null);
  else if ($tipoUsuario == 'R')
    $usuario = new Respondente(null, null, null, null, null, null);

  $txtBtnSalvar = "Cadastrar";
  // $titulo_pagina = "Cadastro de " . strcmp($tipoUsuario, "E") == 0 ? "elaborador" : "respondente";
  $titulo_pagina = "Cadastro de usuário";
}

include_once "cabecalho.php";

echo "<div class='container mt-5'>";
echo "<h1>$titulo_pagina</h1>";

if ($codUsuario)
  echo "<form action='salvarUsuario.php?tipoUsuario={$tipoUsuario}&codUsuario={$codUsuario}' method='POST'>";
else
  echo "<form action='salvarUsuario.php?tipoUsuario={$tipoUsuario}' method='POST'>";

echo "<div class='form-group'>";
echo "<label for='login'>Login:</label>";
echo "<input type='text' class='form-control' id='login' name='login' required value='{$usuario->getLogin()}'/>";
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
echo "<input type='text' class='form-control' id='nome' name='nome' required value='{$usuario->getNome()}'/>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='email'>Email:</label>";
echo "<input type='text' class='form-control' id='email' name='email' required value='{$usuario->getEmail()}'/>";
echo "</div>";

echo "<div class='form-group'>";

if (strcmp($tipoUsuario, "E") == 0) {
  echo "<label for='extra'>Instituição:</label>";
  echo "<input type='text' class='form-control' id='extra' name='extra' required value='{$usuario->getInstituicao()}'/>";
} else if (strcmp($tipoUsuario, "R") == 0) {
  echo "<label for='extra'>Telefone:</label>";
  echo "<input type='text' class='form-control' id='extra' name='extra' required value='{$usuario->getTelefone()}'/>";
}

echo "</div>";

echo "<div>";
echo "<button type='submit' class='btn btn-primary'>{$txtBtnSalvar}</button>";
echo "</form>";
echo "</div>";

?>

<?php
include_once "rodape.php";
?>