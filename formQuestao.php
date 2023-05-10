<?php
include_once "fachada.php";

$tipoQuestao = isset($_POST["tipoQuestao"]) ? addslashes(trim($_POST["tipoQuestao"])) : FALSE;
$enunciado = isset($_POST["enunciado"]) ? addslashes(trim($_POST["enunciado"])) : FALSE;
$respostas = isset($_POST["respostas"]) ? $_POST["respostas"] : FALSE;

$alternativas = [];
foreach ($respostas as $resposta) {
 $alternativas[] = new Alternativa(null, $resposta["texto"], $resposta["correta"], null);
}

$questao = new Questao(null, $enunciado, $tipoQuestao, null, $alternativas);
$factory->getQuestaoDao()->inserir($questao);

$response = array(
 "status" => "success",
 "message" => "Cadastro de questão realizado com sucesso",
);
echo json_encode($response);
exit;
?>