<?php
$titulo_pagina = "Cadastro de Questão";

include_once "fachada.php";

include_once "barraNavegacao.php";

include_once "cabecalho.php";

echo "<script src='js/formQuestao.js'></script>";

echo "<div class='container mt-5'>";
echo "<h1>$titulo_pagina</h1>";


echo "<form action='' id='formQuestao'>";

echo "<div class='form-group'>";
echo "<label for='descricao'>Enunciado:</label>";
echo "<textarea class='form-control' rows='5' id='descricao' name='descricao'></textarea>";
echo "</div>";

echo "<div class='form-group'>";
echo "<div class='form-check-inline'>";
echo "<label class='form-check-label'>";
echo "<input type='radio' class='form-check-input' name='tipo' value='M' onChange='pegaTipo(this)' />Múltipla escolha";
echo "</label>";
echo "</div>";

echo "<div class='form-check-inline'>";
echo "<label class='form-check-label'>";
echo "<input type='radio' class='form-check-input' name='tipo' value='D' onChange='pegaTipo(this)' />Discursiva";
echo "</label>";
echo "</div>";

echo "<div class='form-check-inline'>";
echo "<label class='form-check-label'>";
echo "<input type='radio' class='form-check-input' name='tipo' value='V' onChange='pegaTipo(this)' />Verdadeiro ou falso";
echo "</label>";
echo "</div>";
echo "</div>";

echo "<div id='formTipo' class='form-group pb-3'>";
echo "</div>";

echo "<a class='btn btn-secondary'>Cancelar</a>";
echo "<button type='submit' class='btn btn-primary ml-1'>Criar</button>";
echo "</div>";

echo "</form>";

  ?>

<?php
include_once "rodape.php"
  ?>