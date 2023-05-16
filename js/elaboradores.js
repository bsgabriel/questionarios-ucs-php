$(document).ready(() => {
  carregarElaboradores();
});

function carregarElaboradores() {
  $.get("buscarElaboradores.php", (data) => {
    const elaboradores = JSON.parse(data);
    elaboradores.forEach((elaborador) => {
      criarLinha(elaborador);
    });
  });
}

function pesquisarElaboradores() {
  $("tbody").empty();
  let data;
  data = {
    pesquisa : $("#pesquisa").val()
  };
  $.get("filtrarElaboradores.php", data, (data) => {
    const elaboradores = JSON.parse(data);
    elaboradores.forEach((elaborador) => {
      criarLinha(elaborador);
    });
  });
}

function criarLinha(elaborador) {
  const table = document.getElementById("tabelaElaboradores");
  const row = table.getElementsByTagName("tbody")[0].insertRow(table.length);

  const nome = row.insertCell(0);
  const usuario = row.insertCell(1);
  const email = row.insertCell(2);
  const instituicao = row.insertCell(3);
  const editar = row.insertCell(4);
  const excluir = row.insertCell(5);

  nome.innerHTML = elaborador.nome;
  usuario.innerHTML = elaborador.login;
  email.innerHTML = elaborador.email;
  instituicao.innerHTML = elaborador.instituicao;
  editar.appendChild(createLinkEdicao(elaborador.id));
  excluir.appendChild(createLinkExclusao(elaborador.id));

  editar.classList.add("text-center");
  excluir.classList.add("text-center");
}

function createLinkExclusao(id) {
  const link = createLink("Excluir", "excluirUsuario.php?id=" + id);
  link.onclick = (event) => {
    if (!confirm("Confirmar exclusão?")) {
      event.preventDefault();
    }
  };
  link.classList.add("btn");
  link.classList.add("btn-danger");
  return link;
}

function createLinkEdicao(id) {
  const link = createLink("Editar", "formUsuario.html?tipoUsuario=E&codUsuario="+id);
  link.classList.add("btn");
  link.classList.add("btn-secondary");
  return link;
}

function createLink(text, url) {
  const link = document.createElement("a");
  link.setAttribute("href", url);
  link.appendChild(document.createTextNode(text));

  return link;
}
