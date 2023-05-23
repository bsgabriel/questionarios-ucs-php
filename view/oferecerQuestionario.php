<?php
include_once("components/cabecalho.php");
include_once("components/menuNav.php");
?>
<div class="container mt-5 text-center">
  <h1>Oferecer Questionário</h1>
  <table class="table table-hover text-center" id="tabelaQuestionarios">
    <thead>
      <tr>
        <th></th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Nota de Aprovação</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
  <table class="table table-hover text-center" id="tabelaRespondentes">
    <thead>
      <tr>
        <th></th>
        <th>Nome de usuário</th>
        <th>Nome</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
  <button class="btn btn-primary" onclick="enviarOferta()">Oferecer</button>
</div>
<script type="text/javascript" src="js/oferecerQuestionario.js"></script>

<?php
include_once("components/modal.php");
include_once("components/rodape.php");
?>