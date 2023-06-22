//Variável que guarda o id do questionário escolhido
var idQuest;
const idTabelaRespondentes = "tblOfertaRespondentes";

$(document).ready(() => {
  defaultValues();
  carregarQuestionarios();
});

function defaultValues() {
  $("#principal").empty();
  $("h1").html("Questionários");
  document.title = "Questionários";
  idQuest = null;
}

function carregarQuestionarios() {
  $.get("../controller/buscarQuestionarios.php", (data) => {
    const questionarios = JSON.parse(data);
    questionarios.forEach((questionario) => {
      criarLinhaQuestionario(questionario);
    });
  });
}

function carregarRespondentes() {
  $.get("../controller/buscarRespondentes.php", (data) => {
    const respondentes = JSON.parse(data);
    respondentes.forEach((respondente) => {
      criarLinhaRespondente(respondente);
    });
  });
}

function selecionarQuestionario(idQuestionario) {
  idQuest = idQuestionario;
  $("#principal").empty();
  $("h1").html("Oferecer para...");
  document.title = "Oferecer para...";
  criarTabelaRespondente();
  carregarRespondentes();
}

function criarLinhaQuestionario(questionario) {
  const linhaQuestionario = document.createElement("button");
  linhaQuestionario.classList.add("list-group-item");
  linhaQuestionario.classList.add("list-group-item-action");
  linhaQuestionario.classList.add("list-group-item-light");
  linhaQuestionario.value = questionario.id;
  linhaQuestionario.textContent = questionario.nome;
  linhaQuestionario.addEventListener("click", () => {
    selecionarQuestionario(questionario.id);
  });
  $("#principal").append(linhaQuestionario);
}

function criarTabelaRespondente() {
  const table = document.createElement("table");
  const header = document.createElement("thead");
  const row = document.createElement("tr");
  const colNomeUsuario = document.createElement("td");
  const colNome = document.createElement("td");
  const colEmail = document.createElement("td");
  const btnVoltar = document.createElement("button");
  const btnEnviar = document.createElement("button");

  table.id = idTabelaRespondentes;
  table.classList.add("table");
  table.classList.add("text-center");
  header.classList.add("font-weight-bold");

  colNomeUsuario.textContent = "Nome de usuário";
  colNome.textContent = "Nome";
  colEmail.textContent = "Email";

  btnVoltar.classList.add("btn");
  btnVoltar.classList.add("btn-secondary");
  btnVoltar.classList.add("mr-3");
  btnVoltar.textContent = "Voltar";
  btnVoltar.addEventListener("click", () => {
    voltar();
  });

  btnEnviar.classList.add("btn");
  btnEnviar.classList.add("btn-primary");
  btnEnviar.textContent = "Oferecer";
  btnEnviar.addEventListener("click", () => {
    enviarOferta();
  });

  row.appendChild(document.createElement("td"));
  row.appendChild(colNomeUsuario);
  row.appendChild(colNome);
  row.appendChild(colEmail);
  header.appendChild(row);
  table.appendChild(header);
  table.appendChild(document.createElement("tbody"));

  $("#principal").append(table);
  $("#principal").append(btnVoltar);
  $("#principal").append(btnEnviar);
}

function criarLinhaRespondente(respondente) {
  const table = document.getElementById("tblOfertaRespondentes");
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

function voltar() {
  defaultValues();
  carregarQuestionarios();
}

function enviarOferta() {
  if (!validarSelecao()) {
    console.log("n validou selecao");
    return;
  }
  salvarOferta();
}

function validarSelecao() {
  if (!Number.isInteger(idQuest)) {
    exibirPopup("Selecione um questionário");
    return false;
  }

  if (!$("input[name='codRespondente']:checked").val()) {
    exibirPopup("Selecione pelo menos um respondente");
    return false;
  }

  return true;
}

function salvarOferta() {
  const data = {
    codQuestionario: idQuest,
    lstRespondentes: gerarListaRespondentes(),
  };

  console.log(JSON.stringify(data));

  $.post(
    "../controller/gravarOfertaQuestionario.php",
    data,
    function (response) {
      if (response.status === "success") {
        window.location.href = "menuInicial.php";
      } else {
        exibirPopup(response.message);
        console.log(response.stackTrace);
      }
    },
    "json"
  ).fail(function (xhr, status, error) {
    console.error(error);
  });
}

function gerarListaRespondentes() {
  return $.map($("input[name='codRespondente']:checked"), (elem, idx) => {
    return $(elem).val();
  });
}
