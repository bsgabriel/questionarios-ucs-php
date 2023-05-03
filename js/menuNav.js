$(document).ready(() => {
  carregarMenu();
});

function carregarMenu() {
  $("#menuNav").append(createItem("Início", "menuInicial.html"));

  // TODO achar outra alternativa para o uso do cookie
  const tipUsuario = getCookie("TIPO_USUARIO_AUTENTICADO");
  if (tipUsuario === "A") {
    $("#menuNav").append(createItem("Elaboradores", "elaboradores.html"));
  } else if (tipUsuario === "E") {
    $("#menuNav").append(createItem("Criar questão", "#"));
    $("#menuNav").append(createItem("Criar Questionários", "#"));
    $("#menuNav").append(createItem("Oferecer Questionário", "#"));
  } else {
    $("#menuNav").append(createItem("Responder Questionário", "#"));
    $("#menuNav").append(createItem("Editar Conta", "#"));
  }
  $("#menuNav").append(createItem("Logout", "login.html"));
}

function createItem(text, url) {
  // gera a tag LI
  const item = document.createElement("li");
  item.classList.add("nav-item");

  // gera a tag A
  const link = document.createElement("a");
  link.classList.add("nav-link");
  link.setAttribute("href", url);
  // link.innerText = text;
  link.appendChild(document.createTextNode(text));

  item.appendChild(link);
  return item;
}

function getCookie(cookieName) {
  const cookie = {};
  document.cookie.split(";").forEach((element) => {
    const [key, value] = element.split("=");
    cookie[key.trim()] = value;
  });
  return cookie[cookieName];
}
