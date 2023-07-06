<?php
include_once ("fachada.php");

//Upload da imagem
if(isset($_FILES["Arquivo"])){
    $nome_temporario = $_FILES["Arquivo"]["tmp_name"];
    $nome_real = $_FILES["Arquivo"]["name"];
    $nome_real = str_replace(" ", "_", $nome_real);
    $caminhoCompleto = __DIR__."/../uploads/$nome_real";
    copy($nome_temporario, $caminhoCompleto);
}

$tipoQuestao = isset($_POST["tipoQuestao"]) ? addslashes(trim($_POST["tipoQuestao"])) : FALSE;
$enunciado = isset($_POST["enunciado"]) ? addslashes(trim($_POST["enunciado"])) : FALSE;
$respostas = isset($_POST["respostas"]) ? $_POST["respostas"] : FALSE;

$alternativas = [];
foreach ($respostas as $resposta) {
 $alternativas[] = new Alternativa(null, $resposta["texto"], $resposta["correta"], null);
}

$questao = new Questao(null, $enunciado, $tipoQuestao, $caminhoCompleto, $alternativas);
$factory->getQuestaoDao()->inserir($questao);

$response = array(
 "status" => "success",
 "message" => "Cadastro de questão realizado com sucesso",
);
echo json_encode($response);
exit;
?>