$(document).ready(() => {
  carregarQuestionarios();
  carregarRespondentes();
});

function carregarQuestionarios() {
  $.get("buscarQuestionarios.php", (data) => {
    const questionarios = JSON.parse(data);
    questionarios.forEach((questionario) => {
      criarLinhaQuestionario(questionario);
    });
  });
}

function carregarRespondentes() {
  $.get("buscarRespondentes.php", (data) => {
    const respondentes = JSON.parse(data);
    respondentes.forEach((respondente) => {
      criarLinhaRespondente(respondente);
    });
  });
}

function criarLinhaQuestionario(questionario) {
  const table = document.getElementById("tabelaQuestionarios");
  const row = table.getElementsByTagName("tbody")[0].insertRow(table.length);

  const colCheck = row.insertCell(0);
  const colNome = row.insertCell(1);
  const coldDescricao = row.insertCell(2);
  const colNotaAprovacao = row.insertCell(3);

  const check = document.createElement("input");
  check.setAttribute("type", "radio");
  check.setAttribute("name", "codQuestionario");
  check.setAttribute("value", questionario.id);
  check.classList.add("form-check-input");
  colCheck.appendChild(check);

  colNome.innerHTML = questionario.nome;
  coldDescricao.innerHTML = questionario.descricao;
  colNotaAprovacao.innerHTML = questionario.notaAprovacao;
}

function criarLinhaRespondente(respondente) {
  const table = document.getElementById("tabelaRespondentes");
  const row = table.getElementsByTagName("tbody")[0].insertRow(table.length);

  const colCheck = row.insertCell(0);
  const colUsuario = row.insertCell(1);
  const colNome = row.insertCell(2);
  const colEmail = row.insertCell(3);

  const check = document.createElement("input");
  check.setAttribute("type", "checkbox");
  check.setAttribute("name", "codRespondente");
  check.setAttribute("value", respondente.id);
  check.classList.add("form-check-input");
  colCheck.appendChild(check);

  colUsuario.innerHTML = respondente.login;
  colNome.innerHTML = respondente.nome;
  colEmail.innerHTML = respondente.email;
}

function enviarOferta() {
  if (!validarSelecao()) {
    return;
  }
}

function validarSelecao() {
  if (!$("input[name='codQuestionario']:checked").val()) {
    exibirPopup("Selecione um questionário");
    return false;
  }

  if (!$("input[name='codRespondente']:checked").val()) {
    exibirPopup("Selecione pelo menos um respondente");
    return false;
  }

  return true;
}
