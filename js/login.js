$(document).ready(() => {
  $("#formLogin").submit((event) => {
    event.preventDefault();
    loginEvent();
  });
});

function loginEvent() {
  const usuario = $("#login").val();
  const senha = $("#senha").val();

  if (isEmpty(usuario)) {
    exibirPopup("Informe o usuário");
    return false;
  }

  if (isEmpty(senha)) {
    exibirPopup("Informe a senha");
    return false;
  }

  executarLogin(usuario, senha);
}

function isEmpty(value) {
  return !value || value.trim() === "";
}

function executarLogin(usuario, senha) {
  $.post(
    "login.php",
    { login: usuario, senha: senha },
    function (response) {
      if (response.status === "success") {
        window.location.href = "menuCadastro.html";
      } else {
        exibirPopup(response.message);
      }
    },
    "json"
  ).fail(function (xhr, status, error) {
    console.error(error);
  });
}

function exibirPopup(message) {
  $("#mdlDescricao").text(message);
  $('#janelaModal').modal('show');
}