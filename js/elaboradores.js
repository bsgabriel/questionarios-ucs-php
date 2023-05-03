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

function criarLinha(elaborador) {
  // .getElementsByTagName("tbody")[0].insertRow(table.length);
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
  editar.appendChild(createLink("E", "#"));
  excluir.appendChild(createLink("X", "#"));

  editar.classList.add("text-center");
  excluir.classList.add("text-center");
}

function createLink(text, url) {
  const link = document.createElement("a");
  link.setAttribute("href", url);
  link.appendChild(document.createTextNode(text));
  return link;
}
