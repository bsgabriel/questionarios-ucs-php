$(document).ready(() => {
  ofertas();
});

function ofertas() {
  const idUsuario = getCookie("ID_USUARIO_AUTENTICADO");

  $.get("../controller/buscarOfertas.php?idUsuario=" + idUsuario, (data) => {
    const ofertas = JSON.parse(data);
    ofertas.forEach((oferta) => {
      mostrarOferta(oferta);
    });
  });
}

function mostrarOferta(oferta) {
  const ofertaQuest = document.createElement("li");
  ofertaQuest.classList.add("list-group-item");
  const card = criarCardQuestionario(oferta);
  ofertaQuest.appendChild(card);
  $("#ofertas").append(ofertaQuest);
}

function criarCardQuestionario(oferta) {
  const card = document.createElement("div");
  card.classList.add("card");

  const header = document.createElement("div");
  header.classList.add("card-header");
  let interior = document.createElement("h4");
  interior.textContent = oferta.questionario.nome;
  header.appendChild(interior);
  card.appendChild(header);

  const body = document.createElement("div");
  body.classList.add("card-body");
  body.textContent = oferta.questionario.descricao;
  card.appendChild(body);

  const footer = document.createElement("div");
  footer.classList.add("card-footer");
  interior = document.createElement("a");
  interior.classList.add("btn");
  interior.classList.add("btn-primary");
  interior.textContent = "Responder";
  interior.href = "responder.php";
  footer.appendChild(interior);
  card.appendChild(footer);

  return card;
}
